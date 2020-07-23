<?php
/**
 * @var $faker \Faker\Generator
 */
return [
  'user_id' => $faker->numberBetween(1, 5),
  'comment' => $faker->text,
  'creation_time' => $faker->dateTime()->format('Y-m-d H:i:s'),
];
//php yii fixture/generate chat-messages --count=5
