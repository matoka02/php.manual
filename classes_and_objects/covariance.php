<?php

namespace classes_and_objects\covariance;
print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';


/*===Ковариантность===*/

abstract class Animal
{
  protected string $name;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  abstract public function speak();
}

class Dog extends Animal
{
  public function speak()
  {
    echo $this->name . ' лает';
  }
}

class Cat extends Animal
{
  public function speak()
  {
    echo $this->name . ' мяукает';
  }
}

interface AnimalShelter
{
  public function adopt(string $name): Animal;
}

class CatShelter implements AnimalShelter
{
  public function adopt(string $name): Cat  // Возвращаем класс Cat вместо Animal
  {
    return new Cat($name);
  }
}

class DogShelter implements AnimalShelter
{
  public function adopt(string $name): Dog  // Возвращаем класс Dog вместо Animal
  {
    return new Dog($name);
  }
}

$kitty = (new CatShelter)->adopt('Рыжик');
$kitty->speak();
echo '<br>';
$doggy = (new DogShelter)->adopt('Бобик');
$doggy->speak();


/*===Контравариантность===*/

echo '<hr>';

class Food{}

class AnimalFood extends Food{}

abstract class Animal2
{
  protected string $name;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  public function eat(AnimalFood $food)
  {
    echo $this->name . 'ест' . get_class($food);
  }
}

interface AnimalShelter2
{
  public function adopt(string $name): Animal2;
}

class CatShelter2 implements AnimalShelter2
{
  public function adopt(string $name): Cat2
  {
    return new Cat2($name);
  }
}

class DogShelter2 implements AnimalShelter2
{
  public function adopt(string $name): Dog2
  {
    return new Dog2($name);
  }
}

class Dog2 extends Animal2{
  public function eat(Food $food){
    echo $this->name . ' ест ' . get_class($food);
  }
}

class Cat2 extends Animal2
{
  public function eat(Food $food)
  {
    echo $this->name . ' ест ' . get_class($food);
  }
}

$kitty2 = (new CatShelter2)->adopt('Рыжик-2');
$catFood = new AnimalFood();
$kitty2->eat($catFood);
echo '<br>';

$doggy2 = (new DogShelter2)->adopt('Бобик-2');
$banana = new Food();
$doggy2->eat($banana);
echo '<br>';

$kitty2->eat($banana);