<?php

use yii\db\Migration;

/**
 * Class m211027_184043_create_subway_tables
 */
class m211027_184043_create_subway_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        //Thanks: rob006
        // @link https://stackoverflow.com/a/50892714
        // Create the data tables for subway

        $dataTables = [
            'subway'  => false, // Pick a snack
            'bread'   => false, // Choose what kind of bread you want it on
            'topping' => false, // Your choice in cheese
            'veggies' => false, // Your choice in vegetables
            'finish'  => false, // Sause
            'drink'   => false, // Something to drink?
        ];
        foreach ($dataTables as $dataTable => $created) {
            $tableName = $this->db->tablePrefix . $dataTable;
            if ($this->db->getTableSchema($tableName, true) === null) {
                // https://www.yiiframework.com/doc/guide/2.0/en/db-migrations
                // does NOT show how to create a migration from an existing table
                // Type the script manually here...
                $this->createTable($tableName, [
                    'id' => $this->primaryKey(),
                    'name' => $this->string()->notNull()->unique(),
                    'created_at' => $this->dateTime()->notNull(),
                    'updated_at' => $this->dateTime()->notNull(),
                ], $tableOptions);

                $dataTables[$dataTable] = true;
            }
        }
        if ($dataTable['subway']) {
            $this->addColumn($this->db->tablePrefix . 'subway', 'price', $this->decimal(5,2));
        }
        if ($dataTable['veggies']) {
            $this->addColumn($this->db->tablePrefix . 'veggies', 'type', "ENUM('fresh', 'other')");
        }
        if ($dataTable['finish']) {
            $this->addColumn($this->db->tablePrefix . 'finish', 'fat-free', $this->tinyint());
        }

        $this->fill();
        
        // Once all the static data is ready, create the order system.
        if ($this->db->getTableSchema($this->db->tablePrefix . 'meal', true) === null) {
            $this->createTable($this->db->tablePrefix . 'meal', [
                // Just to make referencing easy
                'id' => $this->primaryKey(),
                // Only one meal per day from the subway. Working late? Order a pizza...
                'date' => $this->date()->notNull()->unique(),
                // Record who opened the (registration for the) meal
                'opened_by' => $this->integer(),
                'opened_at' => $this->dateTime(),
                // Record who closed the registration period for the meal
                'closed_by' => $this->integer(),
                'closed_at' => $this->dateTime(),
                // Other (default) stuff
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime()->notNull(),
            ], $tableOptions);
        }
        if ($this->db->getTableSchema($this->db->tablePrefix . 'meal', true) === null) {
            $this->createTable($this->db->tablePrefix . 'meal', [
                // References the id field of the table 'meal'
                'meal_id' => $this->integer()->notNull(),
                // References the id field of the table 'user'.
                // User table is provided by https://devreadwrite.com/posts/yii2-basic-authorization-and-registration-via-the-database
                'user_id' => $this->integer()->notNull(),
                // If you're not hungry, you can just order just a drink -> allow null
                'subway_id' => $this->integer(),
                // The bread should be manditory, everything else optional
                'bread_id' => $this->integer(),
                // @link https://stackoverflow.com/a/39107036
                'breadsize' => "ENUM('15', '30')",

                'topping_id' => $this->integer(),
                // This blocks multiple types of vegetable on one 'snack'.
                'veggies_id' => $this->integer(),
                'finish_id' => $this->integer(),

                'drink_id' => $this->integer(),

                // Other (default) stuff
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime()->notNull(),
                'PRIMARY KEY(meal_id, user_id)'
            ], $tableOptions);
        }
    }

    /**
     * Not sure yet how to read the count in the database (without the model), so just asume empty. If not, upsert will either ignore or overwrite.
     */
    private function fill()
    {
        $this->upsert('{{%subway}}', ['id' => 4911, 'name' => 'American Steakhouse Melt'], false);
        $this->upsert('{{%subway}}', ['id' => 4913, 'name' => 'Ham'], false);
        $this->upsert('{{%subway}}', ['id' => 4914, 'name' => 'Italian BMT'], false);
        $this->upsert('{{%subway}}', ['id' => 4915, 'name' => 'Chicken Filet'], false);
        $this->upsert('{{%subway}}', ['id' => 4919, 'name' => 'Spice Italian'], false);
        $this->upsert('{{%subway}}', ['id' => 4920, 'name' => 'Steak & Cheese'], false);
        $this->upsert('{{%subway}}', ['id' => 4922, 'name' => 'Subway Melt'], false);
        $this->upsert('{{%subway}}', ['id' => 4923, 'name' => 'Chicken Teriyaki'], false);
        $this->upsert('{{%subway}}', ['id' => 4924, 'name' => 'Tuna'], false);
        $this->upsert('{{%subway}}', ['id' => 4925, 'name' => 'Turkey Filet'], false);
        $this->upsert('{{%subway}}', ['id' => 4928, 'name' => 'Veggie Delite'], false);
        $this->upsert('{{%subway}}', ['id' => 5089, 'name' => 'Chicken Fajita'], false);
        $this->upsert('{{%subway}}', ['id' => 5090, 'name' => 'Bacon Lettace Tomato'], false);
        $this->upsert('{{%subway}}', ['id' => 6769, 'name' => 'Taco Beef'], false);
        $this->upsert('{{%subway}}', ['id' => 7035, 'name' => 'Vegan Supreme'], false);
        $this->upsert('{{%subway}}', ['id' => 7228, 'name' => 'Vegan Patty'], false);
        $this->upsert('{{%subway}}', ['id' => 7512, 'name' => 'Spicy Steak & Bacon Melt'], false);
        $this->upsert('{{%subway}}', ['id' => 9748, 'name' => 'Smoky Chicken Bacon'], false);
        
        $this->upsert('{{%bread}}', ['id' => 1, 'name' => '9-Grain Wheat']);
        $this->upsert('{{%bread}}', ['id' => 2, 'name' => '9-Grain Honey Oat']);
        $this->upsert('{{%bread}}', ['id' => 3, 'name' => 'Italian Parmesan Oregano']);
        
        $this->upsert('{{%veggies}}', ['id' => 1, 'name' => 'Cucumbers', 'type' => 'fresh']);
        $this->upsert('{{%veggies}}', ['id' => 2, 'name' => 'Green Bell Peppers', 'type' => 'fresh']);
        $this->upsert('{{%veggies}}', ['id' => 3, 'name' => 'Lettuce', 'type' => 'fresh']);
        $this->upsert('{{%veggies}}', ['id' => 4, 'name' => 'Red Onions', 'type' => 'fresh']);
        $this->upsert('{{%veggies}}', ['id' => 5, 'name' => 'Tomatoes', 'type' => 'fresh']);
        $this->upsert('{{%veggies}}', ['id' => 6, 'name' => 'Black Olives', 'type' => 'other']);
        $this->upsert('{{%veggies}}', ['id' => 7, 'name' => 'Jalapenos', 'type' => 'other']);
        $this->upsert('{{%veggies}}', ['id' => 8, 'name' => 'Pickles', 'type' => 'other']);
        
        $this->upsert('{{%topping}}', ['id' => 1, 'name' => 'Processed Cheddar']);
        $this->upsert('{{%topping}}', ['id' => 2, 'name' => 'Monterey Cheddar']);

        $this->upsert('{{%finish}}', ['id' => 1, 'name' => 'Chipotle Southwest']);
        $this->upsert('{{%finish}}', ['id' => 2, 'name' => 'Regular Mayonnaise']);
        $this->upsert('{{%finish}}', ['id' => 3, 'name' => 'Honey Mustard', 'fat-free' => 1]);
        $this->upsert('{{%finish}}', ['id' => 4, 'name' => 'Sweet Onion', 'fat-free' => 1]);

        $this->upsert('{{%drink}}', ['id' => 1, 'name' => 'Coffee']);
        $this->upsert('{{%drink}}', ['id' => 2, 'name' => 'Pago']);
        $this->upsert('{{%drink}}', ['id' => 3, 'name' => 'Pepsi Max']);
        $this->upsert('{{%drink}}', ['id' => 4, 'name' => 'Sourcy']);
        $this->upsert('{{%drink}}', ['id' => 5, 'name' => 'Lipton Green Ice Tea']);
        $this->upsert('{{%drink}}', ['id' => 6, 'name' => 'Lipton Peach Ice Tea']);
        $this->upsert('{{%drink}}', ['id' => 7, 'name' => 'Lipton Lemon Ice Tea']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211027_184043_create_subway_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211027_184043_create_subway_tables cannot be reverted.\n";

        return false;
    }
    */
}
