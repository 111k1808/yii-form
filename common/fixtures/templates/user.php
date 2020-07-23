<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'username' => $faker->name(),
		'avatar'  => '/img/ava'.$faker->numberBetween(1, 5).'.jpg',
		'auth_key' => 0,
		'password_hash' => 0,
		'created_at' =>$faker->dateTime()->format('Y-m-d H:i:s'),
		'updated_at' =>$faker->dateTime()->format('Y-m-d H:i:s'),
		'is_executor' =>$faker->boolean
];


//php yii fixture/generate user --count=5

//php yii fixture/load User