<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

use yii\base\InvalidConfigException;
use yii\rbac\DbManager;

/**
 * Initializes RBAC tables
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 * @since 2.0
 */
class m140506_102106_rbac_init extends \yii\db\Migration
{
    /**
     * @throws yii\base\InvalidConfigException
     * @return DbManager
     */
    protected function getAuthManager()
    {
        $authManager = Yii::$app->getAuthManager();
        if (!$authManager instanceof DbManager) {
            throw new InvalidConfigException('You should configure "authManager" component to use database before executing this migration.');
        }
        return $authManager;
    }

    /**
     * @return bool
     */
    protected function isMSSQL()
    {
        return $this->db->driverName === 'mssql' || $this->db->driverName === 'sqlsrv' || $this->db->driverName === 'dblib';
    }

    protected function isOracle()
    {
        return $this->db->driverName === 'oci';
    }

    /**
     * @inheritdoc
     */
    public function up()
    {
        $authManager = $this->getAuthManager();
        $this->db = $authManager->db;

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($authManager->ruleTable, [
            'name' => $this->string(64)->notNull(),
            'data' => $this->binary(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'PRIMARY KEY ([[name]])',
        ], $tableOptions);

        $this->createTable($authManager->itemTable, [
            'name' => $this->string(64)->notNull(),
            'type' => $this->smallInteger()->notNull(),
            'description' => $this->text(),
            'rule_name' => $this->string(64),
            'data' => $this->binary(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'PRIMARY KEY ([[name]])',
            'FOREIGN KEY ([[rule_name]]) REFERENCES ' . $authManager->ruleTable . ' ([[name]])'.
                $this->buildFkClause('ON DELETE SET NULL', 'ON UPDATE CASCADE')
        ], $tableOptions);
        $this->createIndex('idx-auth_item-type', $authManager->itemTable, 'type');

        $this->createTable($authManager->itemChildTable, [
            'parent' => $this->string(64)->notNull(),
            'child' => $this->string(64)->notNull(),
            'PRIMARY KEY ([[parent]], [[child]])',
            'FOREIGN KEY ([[parent]]) REFERENCES ' . $authManager->itemTable . ' ([[name]])'.
                $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
            'FOREIGN KEY ([[child]]) REFERENCES ' . $authManager->itemTable . ' ([[name]])'.
                $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ], $tableOptions);

        $this->createTable($authManager->assignmentTable, [
            'item_name' => $this->string(64)->notNull(),
            'user_id' => $this->string(64)->notNull(),
            'created_at' => $this->integer(),
            'PRIMARY KEY ([[item_name]], [[user_id]])',
            'FOREIGN KEY ([[item_name]]) REFERENCES ' . $authManager->itemTable . ' ([[name]])' .
                $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ], $tableOptions);

        if ($this->isMSSQL()) {
            $this->execute("CREATE TRIGGER dbo.trigger_auth_item_child
            ON dbo.{$authManager->itemTable}
            INSTEAD OF DELETE, UPDATE
            AS
            DECLARE @old_name VARCHAR (64) = (SELECT name FROM deleted)
            DECLARE @new_name VARCHAR (64) = (SELECT name FROM inserted)
            BEGIN
            IF COLUMNS_UPDATED() > 0
                BEGIN
                    IF @old_name <> @new_name
                    BEGIN
                        ALTER TABLE {$authManager->itemChildTable} NOCHECK CONSTRAINT FK__auth_item__child;
                        UPDATE {$authManager->itemChildTable} SET child = @new_name WHERE child = @old_name;
                    END
                UPDATE {$authManager->itemTable}
                SET name = (SELECT name FROM inserted),
                type = (SELECT type FROM inserted),
                description = (SELECT description FROM inserted),
                rule_name = (SELECT rule_name FROM inserted),
                data = (SELECT data FROM inserted),
                created_at = (SELECT created_at FROM inserted),
                updated_at = (SELECT updated_at FROM inserted)
                WHERE name IN (SELECT name FROM deleted)
                IF @old_name <> @new_name
                    BEGIN
                        ALTER TABLE {$authManager->itemChildTable} CHECK CONSTRAINT FK__auth_item__child;
                    END
                END
                ELSE
                    BEGIN
                        DELETE FROM dbo.{$authManager->itemChildTable} WHERE parent IN (SELECT name FROM deleted) OR child IN (SELECT name FROM deleted);
                        DELETE FROM dbo.{$authManager->itemTable} WHERE name IN (SELECT name FROM deleted);
                    END
            END;");
        }
        $this->execute("BEGIN;
                        INSERT INTO {$authManager->itemTable} VALUES ('/admin-user/create:GET', '2', '创建后台用户(查看)', null, 0x733a37353a227b2267726f7570223a225c75373532385c7536323337222c22736f7274223a22333132222c2263617465676f7279223a225c75353430655c75353366305c75373532385c7536323337227d223b, '1505491145', '1505626626'), 
                                                       ('/admin-user/create:POST', '2', '创建后台用户(确定)', null, 0x733a37353a227b2267726f7570223a225c75373532385c7536323337222c22736f7274223a22333133222c2263617465676f7279223a225c75353430655c75353366305c75373532385c7536323337227d223b, '1505491177', '1505626626'), 
                                                       ('/admin-user/delete:POST', '2', '删除后台用户', null, 0x733a37353a227b2267726f7570223a225c75373532385c7536323337222c22736f7274223a22333136222c2263617465676f7279223a225c75353430655c75353366305c75373532385c7536323337227d223b, '1505491283', '1505626626'), 
                                                       ('/admin-user/index:GET', '2', '后台用户列表', null, 0x733a37353a227b2267726f7570223a225c75373532385c7536323337222c22736f7274223a22333130222c2263617465676f7279223a225c75353430655c75353366305c75373532385c7536323337227d223b, '1505491096', '1505626626'), 
                                                       ('/admin-user/update:GET', '2', '修改后台用户(查看)', null, 0x733a37353a227b2267726f7570223a225c75373532385c7536323337222c22736f7274223a22333134222c2263617465676f7279223a225c75353430655c75353366305c75373532385c7536323337227d223b, '1505491206', '1505626626'), 
                                                       ('/admin-user/update:POST', '2', '修改后台用户(确定)', null, 0x733a37353a227b2267726f7570223a225c75373532385c7536323337222c22736f7274223a22333135222c2263617465676f7279223a225c75353430655c75353366305c75373532385c7536323337227d223b, '1505491257', '1505626626'), 
                                                       ('/article/create:GET', '2', '创建文章(查看)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323031222c2263617465676f7279223a225c75363538375c7537616530227d223b, '1505486958', '1505626214'), 
                                                       ('/article/create:POST', '2', '创建文章(确定)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323032222c2263617465676f7279223a225c75363538375c7537616530227d223b, '1505486994', '1505626214'), 
                                                       ('/article/delete:POST', '2', '删除文章', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323036222c2263617465676f7279223a225c75363538375c7537616530227d223b, '1505490012', '1505627558'), 
                                                       ('/article/index:GET', '2', '文章列表', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323030222c2263617465676f7279223a225c75363538375c7537616530227d223b, '1505486821', '1505626214'), 
                                                       ('/article/sort:POST', '2', '文章排序', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323035222c2263617465676f7279223a225c75363538375c7537616530227d223b, '1505627065', '1505627558'), 
                                                       ('/article/update:GET', '2', '修改文章(查看)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323033222c2263617465676f7279223a225c75363538375c7537616530227d223b, '1505487091', '1505626214'), 
                                                       ('/article/update:POST', '2', '修改文章(确定)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323034222c2263617465676f7279223a225c75363538375c7537616530227d223b, '1505487132', '1505626214'), 
                                                       ('/category/create:GET', '2', '创建分类(查看)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323131222c2263617465676f7279223a225c75353230365c7537633762227d223b, '1505489753', '1505626254'), 
                                                       ('/category/create:POST', '2', '创建分类(确定)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323132222c2263617465676f7279223a225c75353230365c7537633762227d223b, '1505489813', '1505626254'), 
                                                       ('/category/delete:POST', '2', '删除分类', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323136222c2263617465676f7279223a225c75353230365c7537633762227d223b, '1505489938', '1505627558'), 
                                                       ('/category/index:GET', '2', '分类列表', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323130222c2263617465676f7279223a225c75353230365c7537633762227d223b, '1505489718', '1505626254'), 
                                                       ('/category/sort:POST', '2', '分类排序', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323135222c2263617465676f7279223a225c75353230365c7537633762227d223b, '1505627133', '1505627558'), 
                                                       ('/category/update:GET', '2', '修改分类(查看)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323133222c2263617465676f7279223a225c75353230365c7537633762227d223b, '1505489845', '1505626254'), 
                                                       ('/category/update:POST', '2', '修改分类(确定)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323134222c2263617465676f7279223a225c75353230365c7537633762227d223b, '1505489881', '1505626254'), 
                                                       ('/clear/backend:GET', '2', '删除后台缓存', null, 0x733a36333a227b2267726f7570223a225c75376631335c7535623538222c22736f7274223a22363031222c2263617465676f7279223a225c75376631335c7535623538227d223b, '1505491837', '1505626868'), 
                                                       ('/clear/agent:GET', '2', '删除前台缓存', null, 0x733a36333a227b2267726f7570223a225c75376631335c7535623538222c22736f7274223a22363030222c2263617465676f7279223a225c75376631335c7535623538227d223b, '1505491810', '1505626868'), 
                                                       ('/comment/index:GET', '2', '评论列表', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323230222c2263617465676f7279223a225c75386263345c7538626261227d223b, '1505487310', '1505626296'), 
                                                       ('/comment/update:GET', '2', '修改评论(查看)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323231222c2263617465676f7279223a225c75386263345c7538626261227d223b, '1505488537', '1505626296'), 
                                                       ('/comment/update:POST', '2', '修改评论(确定)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323232222c2263617465676f7279223a225c75386263345c7538626261227d223b, '1505488570', '1505626296'), 
                                                       ('/friendly-link/create:GET', '2', '创建友情链接(查看)', null, 0x733a38373a227b2267726f7570223a225c75353363625c75363063355c75393466655c7536336135222c22736f7274223a22353031222c2263617465676f7279223a225c75353363625c75363063355c75393466655c7536336135227d223b, '1505491474', '1505626848'), 
                                                       ('/friendly-link/create:POST', '2', '创建友情链接(确定)', null, 0x733a38373a227b2267726f7570223a225c75353363625c75363063355c75393466655c7536336135222c22736f7274223a22353032222c2263617465676f7279223a225c75353363625c75363063355c75393466655c7536336135227d223b, '1505491511', '1505626848'), 
                                                       ('/friendly-link/delete:POST', '2', '删除友情链接', null, 0x733a38373a227b2267726f7570223a225c75353363625c75363063355c75393466655c7536336135222c22736f7274223a22353036222c2263617465676f7279223a225c75353363625c75363063355c75393466655c7536336135227d223b, '1505491603', '1505627558'), 
                                                       ('/friendly-link/index:GET', '2', '友情链接列表', null, 0x733a38373a227b2267726f7570223a225c75353363625c75363063355c75393466655c7536336135222c22736f7274223a22353030222c2263617465676f7279223a225c75353363625c75363063355c75393466655c7536336135227d223b, '1505491435', '1505626848'), 
                                                       ('/friendly-link/sort:POST', '2', '友情链接排序', null, 0x733a38373a227b2267726f7570223a225c75353363625c75363063355c75393466655c7536336135222c22736f7274223a22353035222c2263617465676f7279223a225c75353363625c75363063355c75393466655c7536336135227d223b, '1505627295', '1505627558'), 
                                                       ('/friendly-link/update:GET', '2', '修改友情链接(查看)', null, 0x733a38373a227b2267726f7570223a225c75353363625c75363063355c75393466655c7536336135222c22736f7274223a22353033222c2263617465676f7279223a225c75353363625c75363063355c75393466655c7536336135227d223b, '1505491547', '1505626848'), 
                                                       ('/friendly-link/update:POST', '2', '修改友情链接(确定)', null, 0x733a38373a227b2267726f7570223a225c75353363625c75363063355c75393466655c7536336135222c22736f7274223a22353034222c2263617465676f7279223a225c75353363625c75363063355c75393466655c7536336135227d223b, '1505491571', '1505626848'), 
                                                       ('/agent-menu/create:GET', '2', '创建前台菜单(查看)', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313031222c2263617465676f7279223a225c75353234645c75353366305c75383364635c7535333535227d223b, '1505490500', '1505626149'), 
                                                       ('/agent-menu/create:POST', '2', '创建前台菜单(确定)', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313032222c2263617465676f7279223a225c75353234645c75353366305c75383364635c7535333535227d223b, '1505490586', '1505626149'), 
                                                       ('/agent-menu/delete:POST', '2', '删除前台菜单', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313036222c2263617465676f7279223a225c75353234645c75353366305c75383364635c7535333535227d223b, '1505490673', '1505627558'), 
                                                       ('/agent-menu/index:GET', '2', '前台菜单列表', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313030222c2263617465676f7279223a225c75353234645c75353366305c75383364635c7535333535227d223b, '1505490468', '1505626149'), 
                                                       ('/agent-menu/sort:POST', '2', '前台菜单排序', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313035222c2263617465676f7279223a225c75353234645c75353366305c75383364635c7535333535227d223b, '1505627002', '1505627558'), 
                                                       ('/agent-menu/update:GET', '2', '修改前台菜单(查看)', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313033222c2263617465676f7279223a225c75353234645c75353366305c75383364635c7535333535227d223b, '1505490617', '1505626149'), 
                                                       ('/agent-menu/update:POST', '2', '修改前台菜单(确定)', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313034222c2263617465676f7279223a225c75353234645c75353366305c75383364635c7535333535227d223b, '1505490643', '1505626149'), 
                                                       ('/log/delete:POST', '2', '删除日志', null, 0x733a36333a227b2267726f7570223a225c75363565355c7535666437222c22736f7274223a22373032222c2263617465676f7279223a225c75363565355c7535666437227d223b, '1505491737', '1505626889'), 
                                                       ('/log/index:GET', '2', '日志列表', null, 0x733a36333a227b2267726f7570223a225c75363565355c7535666437222c22736f7274223a22373030222c2263617465676f7279223a225c75363565355c7535666437227d223b, '1505491668', '1505626889'), 
                                                       ('/log/view-layer:GET', '2', '查看日志详情', null, 0x733a36333a227b2267726f7570223a225c75363565355c7535666437222c22736f7274223a22373031222c2263617465676f7279223a225c75363565355c7535666437227d223b, '1505491709', '1505626889'), 
                                                       ('/menu/create:GET', '2', '创建前台菜单(查看)', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313131222c2263617465676f7279223a225c75353430655c75353366305c75383364635c7535333535227d223b, '1505490290', '1505626149'), 
                                                       ('/menu/create:POST', '2', '创建后台菜单(确定)', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313132222c2263617465676f7279223a225c75353430655c75353366305c75383364635c7535333535227d223b, '1505490326', '1505626149'), 
                                                       ('/menu/delete:POST', '2', '删除后台菜单', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313136222c2263617465676f7279223a225c75353430655c75353366305c75383364635c7535333535227d223b, '1505490424', '1505627558'), 
                                                       ('/menu/index:GET', '2', '后台菜单列表', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313130222c2263617465676f7279223a225c75353430655c75353366305c75383364635c7535333535227d223b, '1505490244', '1505626149'), 
                                                       ('/menu/sort:POST', '2', '后台菜单排序', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313135222c2263617465676f7279223a225c75353430655c75353366305c75383364635c7535333535227d223b, '1505627029', '1505627558'), 
                                                       ('/menu/update:GET', '2', '修改后台菜单(查看)', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313133222c2263617465676f7279223a225c75353430655c75353366305c75383364635c7535333535227d223b, '1505490360', '1505626149'), 
                                                       ('/menu/update:POST', '2', '修改后台菜单(确定)', null, 0x733a37353a227b2267726f7570223a225c75383364635c7535333535222c22736f7274223a22313134222c2263617465676f7279223a225c75353430655c75353366305c75383364635c7535333535227d223b, '1505490388', '1505626149'), 
                                                       ('/page/create:GET', '2', '创建单页(查看)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323331222c2263617465676f7279223a225c75353335355c7539383735227d223b, '1505489298', '1505626318'), 
                                                       ('/page/create:POST', '2', '创建单页(确定)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323332222c2263617465676f7279223a225c75353335355c7539383735227d223b, '1505489334', '1505626318'), 
                                                       ('/page/delete:POST', '2', '删除单页', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323336222c2263617465676f7279223a225c75353335355c7539383735227d223b, '1505489980', '1505627558'), 
                                                       ('/page/index:GET', '2', '单页列表', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323330222c2263617465676f7279223a225c75353335355c7539383735227d223b, '1505489257', '1505626318'), 
                                                       ('/page/sort:POST', '2', '单页排序', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323335222c2263617465676f7279223a225c75353335355c7539383735227d223b, '1505627165', '1505627558'), 
                                                       ('/page/update:GET', '2', '修改单页(查看)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323333222c2263617465676f7279223a225c75353335355c7539383735227d223b, '1505489549', '1505626318'), 
                                                       ('/page/update:POST', '2', '修改单页(确定)', null, 0x733a36333a227b2267726f7570223a225c75353138355c7535626239222c22736f7274223a22323334222c2263617465676f7279223a225c75353335355c7539383735227d223b, '1505489617', '1505626318'), 
                                                       ('/rbac/permission-create:GET', '2', '创建权限(查看)', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343031222c2263617465676f7279223a225c75363734335c7539363530227d223b, '1505491973', '1505626728'), 
                                                       ('/rbac/permission-create:POST', '2', '创建权限(确定)', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343032222c2263617465676f7279223a225c75363734335c7539363530227d223b, '1505492031', '1505626728'), 
                                                       ('/rbac/permission-delete:POST', '2', '删除权限', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343036222c2263617465676f7279223a225c75363734335c7539363530227d223b, '1505492312', '1505627558'), 
                                                       ('/rbac/permission-sort:POST', '2', '权限排序', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343035222c2263617465676f7279223a225c75363734335c7539363530227d223b, '1505627221', '1505627558'), 
                                                       ('/rbac/permission-update:GET', '2', '修改权限(查看)', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343033222c2263617465676f7279223a225c75363734335c7539363530227d223b, '1505492199', '1505626728'), 
                                                       ('/rbac/permission-update:POST', '2', '修改权限(确定)', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343034222c2263617465676f7279223a225c75363734335c7539363530227d223b, '1505492277', '1505626728'), 
                                                       ('/rbac/permissions:GET', '2', '权限列表', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343030222c2263617465676f7279223a225c75363734335c7539363530227d223b, '1505491923', '1505626728'), 
                                                       ('/rbac/role-create:GET', '2', '创建角色(查看)', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343131222c2263617465676f7279223a225c75383964325c7538323732227d223b, '1505492374', '1505626728'), 
                                                       ('/rbac/role-create:POST', '2', '创建角色(确定)', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343132222c2263617465676f7279223a225c75383964325c7538323732227d223b, '1505492408', '1505626728'), 
                                                       ('/rbac/role-delete:POST', '2', '删除角色', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343136222c2263617465676f7279223a225c75383964325c7538323732227d223b, '1505492497', '1505627558'), 
                                                       ('/rbac/role-update:GET', '2', '修改角色(查看)', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343133222c2263617465676f7279223a225c75383964325c7538323732227d223b, '1505492434', '1505626728'), 
                                                       ('/rbac/role-update:POST', '2', '修改角色(确定)', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343134222c2263617465676f7279223a225c75383964325c7538323732227d223b, '1505492463', '1505626728'), 
                                                       ('/rbac/roles-sort:POST', '2', '角色排序', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343135222c2263617465676f7279223a225c75383964325c7538323732227d223b, '1505627246', '1505627558'), 
                                                       ('/rbac/roles:GET', '2', '角色列表', null, 0x733a37353a227b2267726f7570223a225c75363734335c75393635305c75376261315c7537343036222c22736f7274223a22343130222c2263617465676f7279223a225c75383964325c7538323732227d223b, '1505492339', '1505626728'), 
                                                       ('/setting/custom-create:POST', '2', '创建自定义设置项(确定)', null, 0x733a38313a227b2267726f7570223a225c75386262655c7537663665222c22736f7274223a22303135222c2263617465676f7279223a225c75383165615c75356239615c75346534395c75386262655c7537663665227d223b, '1505486899', '1505627612'), 
                                                       ('/setting/custom:GET', '2', '自定义设置(查看)', null, 0x733a38313a227b2267726f7570223a225c75386262655c7537663665222c22736f7274223a22303133222c2263617465676f7279223a225c75383165615c75356239615c75346534395c75386262655c7537663665227d223b, '1505486625', '1505627612'), 
                                                       ('/setting/custom:POST', '2', '自定义设置(确定)', null, 0x733a38313a227b2267726f7570223a225c75386262655c7537663665222c22736f7274223a22303134222c2263617465676f7279223a225c75383165615c75356239615c75346534395c75386262655c7537663665227d223b, '1505486664', '1505627612'), 
                                                       ('/setting/smtp:GET', '2', 'smpt设置(查看)', null, 0x733a36373a227b2267726f7570223a225c75386262655c7537663665222c22736f7274223a22303130222c2263617465676f7279223a22736d74705c75386262655c7537663665227d223b, '1505486510', '1505626085'), 
                                                       ('/setting/smtp:POST', '2', 'smtp设置(确定)', null, 0x733a36373a227b2267726f7570223a225c75386262655c7537663665222c22736f7274223a22303131222c2263617465676f7279223a22736d74705c75386262655c7537663665227d223b, '1505486562', '1505626920'), 
                                                       ('/setting/test-smtp:POST', '2', '测试smtp设置', null, 0x733a36373a227b2267726f7570223a225c75386262655c7537663665222c22736f7274223a22303132222c2263617465676f7279223a22736d74705c75386262655c7537663665227d223b, '1505492827', '1505626085'), 
                                                       ('/setting/website:GET', '2', '网站设置(查看)', null, 0x733a37353a227b2267726f7570223a225c75386262655c7537663665222c22736f7274223a22303030222c2263617465676f7279223a225c75376635315c75376164395c75386262655c7537663665227d223b, '1505486405', '1505626028'), 
                                                       ('/setting/website:POST', '2', '网站设置(确定)', null, 0x733a37353a227b2267726f7570223a225c75386262655c7537663665222c22736f7274223a22303031222c2263617465676f7279223a225c75376635315c75376164395c75386262655c7537663665227d223b, '1505486444', '1505626055'), 
                                                       ('/user/create:GET', '2', '创建前台用户(查看)', null, 0x733a37353a227b2267726f7570223a225c75373532385c7536323337222c22736f7274223a22333031222c2263617465676f7279223a225c75353234645c75353366305c75373532385c7536323337227d223b, '1505490833', '1505626626'), 
                                                       ('/user/create:POST', '2', '创建前台用户(确定)', null, 0x733a37353a227b2267726f7570223a225c75373532385c7536323337222c22736f7274223a22333032222c2263617465676f7279223a225c75353234645c75353366305c75373532385c7536323337227d223b, '1505490875', '1505626626'), 
                                                       ('/user/delete:POST', '2', '删除前台用户', null, 0x733a37353a227b2267726f7570223a225c75373532385c7536323337222c22736f7274223a22333035222c2263617465676f7279223a225c75353234645c75353366305c75373532385c7536323337227d223b, '1505491033', '1505627698'), 
                                                       ('/user/index:GET', '2', '前台用户列表', null, 0x733a37353a227b2267726f7570223a225c75373532385c7536323337222c22736f7274223a22333030222c2263617465676f7279223a225c75353234645c75353366305c75373532385c7536323337227d223b, '1505490796', '1505626626'), 
                                                       ('/user/update:GET', '2', '修改前台用户(查看)', null, 0x733a37353a227b2267726f7570223a225c75373532385c7536323337222c22736f7274223a22333033222c2263617465676f7279223a225c75353234645c75353366305c75373532385c7536323337227d223b, '1505490922', '1505626626'), 
                                                       ('/user/update:POST', '2', '修改前台用户(确定)', null, 0x733a37353a227b2267726f7570223a225c75373532385c7536323337222c22736f7274223a22333034222c2263617465676f7279223a225c75353234645c75353366305c75373532385c7536323337227d223b, '1505490999', '1505626626'), 
                                                       ('/banner/banner-create:GET', '2', '创建banner(查看)', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383131222C2263617465676F7279223A2262616E6E6572227D223B, '1512391883', '1512400103'), 
                                                       ('/banner/banner-create:POST', '2', '创建banner(确定)', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383132222C2263617465676F7279223A2262616E6E6572227D223B, '1512391917', '1512400103'), 
                                                       ('/banner/banner-delete:POST', '2', '删除banner', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383136222C2263617465676F7279223A2262616E6E6572227D223B, '1512399348', '1512721982'), 
                                                       ('/banner/banner-sort:POST', '2', 'banner排序', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383135222C2263617465676F7279223A2262616E6E6572227D223B, '1512399382', '1512400103'), 
                                                       ('/banner/banner-update:GET', '2', '修改banner(查看)', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383133222C2263617465676F7279223A2262616E6E6572227D223B, '1512399264', '1512400103'), 
                                                       ('/banner/banner-update:POST', '2', '修改banner(确定)', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383134222C2263617465676F7279223A2262616E6E6572227D223B, '1512399300', '1512400103'), 
                                                       ('/banner/banners:GET', '2', 'banner列表', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383130222C2263617465676F7279223A2262616E6E6572227D223B, '1512391845', '1512400103'), 
                                                       ('/banner/create:GET', '2', '创建banner类型(查看)', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383031222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512383408', '1512400103'), 
                                                       ('/banner/create:POST', '2', '创建banner类型(确定)', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383032222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512383484', '1512400103'), 
                                                       ('/banner/delete:POST', '2', '删除banner类型', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383033222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512386749', '1512400103'), 
                                                       ('/banner/index:GET', '2', 'banner类型列表', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383030222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512382866', '1512400103'), 
                                                       ('/banner/sort:POST', '2', 'banner类型排序', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383036222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512399382', '1512721982'), 
                                                       ('/banner/update:GET', '2', '修改banner类型(查看)', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383034222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512386694', '1512400103'), 
                                                       ('/banner/update:POST', '2', '修改banner类型(确定)', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383035222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512386722', '1512400103'), 
                                                       ('/ad/create:GET', '2', '创建广告(查看)', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393131222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512383408', '1512722062'), 
                                                       ('/ad/create:POST', '2', '创建广告(确定)', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393132222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512383484', '1512722063'), 
                                                       ('/ad/delete:POST', '2', '删除广告', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393133222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512386749', '1512722063'), 
                                                       ('/ad/index:GET', '2', '广告列表', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393130222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512382866', '1512722062'), 
                                                       ('/ad/sort:POST', '2', '广告排序', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393136222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512399382', '1512722063'), 
                                                       ('/ad/update:GET', '2', '修改广告(查看)', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393134222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512386694', '1512722063'), 
                                                       ('/ad/update:POST', '2', '修改广告(确定)', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393135222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512386722', '1512722063');
                         COMMIT;"
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $authManager = $this->getAuthManager();
        $this->db = $authManager->db;

        if ($this->isMSSQL()) {
            $this->execute('DROP TRIGGER dbo.trigger_auth_item_child;');
        }

        $this->dropTable($authManager->assignmentTable);
        $this->dropTable($authManager->itemChildTable);
        $this->dropTable($authManager->itemTable);
        $this->dropTable($authManager->ruleTable);
    }

    protected function buildFkClause($delete = '', $update = '')
    {
        if ($this->isMSSQL()) {
            return '';
        }

        if ($this->isOracle()) {
            return ' ' . $delete;
        }

        return implode(' ', ['', $delete, $update]);
    }
}
