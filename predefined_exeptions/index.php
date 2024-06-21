<?php

namespace predefined_exeptions;
use Exception;
use Throwable;

/*
 * Класс Exception — базовый класс для всех пользовательских исключений.
 * 1.1 Исключение ErrorException - исключение, если возникла ошибка.
 * 1.2 Исключение ClosedGeneratorException выбрасывается при попытке получить значение из закрытого
 * итератора, реализованного классом Generator.
 */

//  class Exception implements Throwable
//  {
//  /* Свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Методы */
//  public __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
//  final public getMessage(): string
//  final public getPrevious(): ?Throwable
//  final public getCode(): int
//  final public getFile(): string
//  final public getLine(): int
//  final public getTrace(): array
//  final public getTraceAsString(): string
//  public __toString(): string
//  private __clone(): void
//  }


//  class ErrorException extends Exception
//  {
//  /* Свойства */
//  protected int $severity = E_ERROR;
//  /* Наследуемые свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Методы */
//  public __construct(
//    string $message = "",
//    int $code = 0,
//    int $severity = E_ERROR,
//    ?string $filename = null,
//    ?int $line = null,
//    ?Throwable $previous = null
//)
//  final public getSeverity(): int
//  /* Наследуемые методы */
//  final public Exception::getMessage(): string
//  final public Exception::getPrevious(): ?Throwable
//  final public Exception::getCode(): int
//  final public Exception::getFile(): string
//  final public Exception::getLine(): int
//  final public Exception::getTrace(): array
//  final public Exception::getTraceAsString(): string
//  public Exception::__toString(): string
//  private Exception::__clone(): void
//  }


//  class ClosedGeneratorException extends Exception
//  {
//  /* Наследуемые свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Наследуемые методы */
//  public Exception::__construct(string $message = "", int $code = 0, ?Throwable $previous = null)
//  final public Exception::getMessage(): string
//  final public Exception::getPrevious(): ?Throwable
//  final public Exception::getCode(): int
//  final public Exception::getFile(): string
//  final public Exception::getLine(): int
//  final public Exception::getTrace(): array
//  final public Exception::getTraceAsString(): string
//  public Exception::__toString(): string
//  private Exception::__clone(): void
//  }


/*
 * Класс Error — базовый класс для всех внутренних ошибок PHP.
 * 2.1 Исключение ArgumentCountError выбрасывается, когда в пользовательский метод или функцию
 * передали недостаточное количество аргументов.
 * Эта ошибка также выбрасывается, если в невариативную встроенную функцию передаётся слишком
 * много аргументов.
 * 2.2 Исключение ArithmeticError выбрасывается, когда возникает ошибка при выполнении
 * математических операций.
 * 2.3 Исключение AssertionError выбрасывается, когда утверждение функции assert() терпит неудачу.
 * 2.3.1 Исключение DivisionByZeroError выбрасывается при попытке поделить число на ноль.
 * 2.4 Исключение CompileError выбрасывается при некоторых ошибках компиляции, которые раньше
 * выдавали фатальную ошибку.
 * 2.4.1 Исключение ParseError выбрасывается, когда возникает ошибка при разборе PHP-кода,
 * например, при вызове функции eval().
 * 2.5 Исключение TypeError выбрасывается, если:
 * - Значение, которое устанавливают для свойства класса, не соответствует объявленному типу
 * свойства.
 * - Тип аргумента, который передали в функцию, не соответствует типу, который для этого
 * аргумента объявили в функции.
 * - Тип значения, которое вернула функция, не соответствует типу возврата, который объявили в
 * функции.
 * 2.6 Исключение ValueError выбрасывается, если тип аргумента правильный, но значение аргумента
 * неверное.
 * 2.7 Исключение UnhandledMatchError выбрасывается, если субъект, который передали в выражение
 * match, не обрабатывается ни одной из сторон выражения match.
 * 2.8 Исключение FiberError выбрасывает, если в объекте класса Fiber выполняется недопустимая операция.
 */

//  class Error implements Throwable
//  {
//  /* Свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Методы */
//  public __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
//  final public getMessage(): string
//  final public getPrevious(): ?Throwable
//  final public getCode(): int
//  final public getFile(): string
//  final public getLine(): int
//  final public getTrace(): array
//  final public getTraceAsString(): string
//  public __toString(): string
//  private __clone(): void
//  }

//  class ArgumentCountError extends TypeError
//  {
//  /* Наследуемые свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Наследуемые методы */
//  public Error::__construct(string $message = "", int $code = 0, ?Throwable $previous = null)
//  final public Error::getMessage(): string
//  final public Error::getPrevious(): ?Throwable
//  final public Error::getCode(): int
//  final public Error::getFile(): string
//  final public Error::getLine(): int
//  final public Error::getTrace(): array
//  final public Error::getTraceAsString(): string
//  public Error::__toString(): string
//  private Error::__clone(): void
//  }

//  class ArithmeticError extends Error
//  {
//  /* Наследуемые свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Наследуемые методы */
//  public Error::__construct(string $message = "", int $code = 0, ?Throwable $previous = null)
//  final public Error::getMessage(): string
//  final public Error::getPrevious(): ?Throwable
//  final public Error::getCode(): int
//  final public Error::getFile(): string
//  final public Error::getLine(): int
//  final public Error::getTrace(): array
//  final public Error::getTraceAsString(): string
//  public Error::__toString(): string
//  private Error::__clone(): void
//  }

//  class AssertionError extends Error
//  {
//  /* Наследуемые свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Наследуемые методы */
//  public Error::__construct(string $message = "", int $code = 0, ?Throwable $previous = null)
//  final public Error::getMessage(): string
//  final public Error::getPrevious(): ?Throwable
//  final public Error::getCode(): int
//  final public Error::getFile(): string
//  final public Error::getLine(): int
//  final public Error::getTrace(): array
//  final public Error::getTraceAsString(): string
//  public Error::__toString(): string
//  private Error::__clone(): void
//  }

//  class DivisionByZeroError extends ArithmeticError
//  {
//  /* Наследуемые свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Наследуемые методы */
//  public Error::__construct(string $message = "", int $code = 0, ?Throwable $previous = null)
//  final public Error::getMessage(): string
//  final public Error::getPrevious(): ?Throwable
//  final public Error::getCode(): int
//  final public Error::getFile(): string
//  final public Error::getLine(): int
//  final public Error::getTrace(): array
//  final public Error::getTraceAsString(): string
//  public Error::__toString(): string
//  private Error::__clone(): void
//  }

//  class CompileError extends Error
//  {
//  /* Наследуемые свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Наследуемые методы */
//  public Error::__construct(string $message = "", int $code = 0, ?Throwable $previous = null)
//  final public Error::getMessage(): string
//  final public Error::getPrevious(): ?Throwable
//  final public Error::getCode(): int
//  final public Error::getFile(): string
//  final public Error::getLine(): int
//  final public Error::getTrace(): array
//  final public Error::getTraceAsString(): string
//  public Error::__toString(): string
//  private Error::__clone(): void
//  }


//  class ParseError extends CompileError
//  {
//  /* Наследуемые свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Наследуемые методы */
//  public Error::__construct(string $message = "", int $code = 0, ?Throwable $previous = null)
//  final public Error::getMessage(): string
//  final public Error::getPrevious(): ?Throwable
//  final public Error::getCode(): int
//  final public Error::getFile(): string
//  final public Error::getLine(): int
//  final public Error::getTrace(): array
//  final public Error::getTraceAsString(): string
//  public Error::__toString(): string
//  private Error::__clone(): void
//  }

//  class TypeError extends Error
//  {
//  /* Наследуемые свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Наследуемые методы */
//  public Error::__construct(string $message = "", int $code = 0, ?Throwable $previous = null)
//  final public Error::getMessage(): string
//  final public Error::getPrevious(): ?Throwable
//  final public Error::getCode(): int
//  final public Error::getFile(): string
//  final public Error::getLine(): int
//  final public Error::getTrace(): array
//  final public Error::getTraceAsString(): string
//  public Error::__toString(): string
//  private Error::__clone(): void
//  }

//  class ValueError extends Error
//  {
//  /* Наследуемые свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Наследуемые методы */
//  public Error::__construct(string $message = "", int $code = 0, ?Throwable $previous = null)
//  final public Error::getMessage(): string
//  final public Error::getPrevious(): ?Throwable
//  final public Error::getCode(): int
//  final public Error::getFile(): string
//  final public Error::getLine(): int
//  final public Error::getTrace(): array
//  final public Error::getTraceAsString(): string
//  public Error::__toString(): string
//  private Error::__clone(): void
//  }


//  class UnhandledMatchError extends Error
//  {
//  /* Наследуемые свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Наследуемые методы */
//  public Error::__construct(string $message = "", int $code = 0, ?Throwable $previous = null)
//  final public Error::getMessage(): string
//  final public Error::getPrevious(): ?Throwable
//  final public Error::getCode(): int
//  final public Error::getFile(): string
//  final public Error::getLine(): int
//  final public Error::getTrace(): array
//  final public Error::getTraceAsString(): string
//  public Error::__toString(): string
//  private Error::__clone(): void
//  }


//  final class FiberError extends Error
//  {
//  /* Наследуемые свойства */
//  protected string $message = "";
//  private string $string = "";
//  protected int $code;
//  protected string $file = "";
//  protected int $line;
//  private array $trace = [];
//  private ?Throwable $previous = null;
//  /* Методы */
//  /* Наследуемые методы */
//  final public Error::getMessage(): string
//  final public Error::getPrevious(): ?Throwable
//  final public Error::getCode(): int
//  final public Error::getFile(): string
//  final public Error::getLine(): int
//  final public Error::getTrace(): array
//  final public Error::getTraceAsString(): string
//  public Error::__toString(): string
//  private Error::__clone(): void
//  }