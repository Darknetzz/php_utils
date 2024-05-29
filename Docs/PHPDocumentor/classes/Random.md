***

# Random

The Random class provides various randomization functions.



* Full name: `\Random`
* Parent class: [`\Base`](./Base.md)




## Methods


### array_pick_random

Picks a random element from an array.

```php
public array_pick_random(array $array): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** | The array to pick a random element from. |


**Return Value:**

The randomly picked element.




***

### genStr

Generates a random string.

```php
public genStr(int $len = 24, array $charset = [], array $required = []): string
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$len` | **int** | The length of the generated string. Default is 24. |
| `$charset` | **array** | The character set to use for generating the string. Default is an empty array. |
| `$required` | **array** | The types of characters that must be included in the generated string. Default is an empty array. |


**Return Value:**

The generated random string.




***

### roll

Rolls a random number between the specified range.

```php
public roll(int $from = 1, int $to = 100): int
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$from` | **int** | The minimum value of the range. Default is 1. |
| `$to` | **int** | The maximum value of the range. Default is 100. |


**Return Value:**

The randomly rolled number.




***

### percentage

Determines if a random event occurs based on a given chance.

```php
public percentage(int $chance = 50): bool
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$chance` | **int** | The chance of the event occurring, in percentage. Default is 50. |


**Return Value:**

True if the event occurs, false otherwise.




***


## Inherited methods


### __construct



```php
public __construct(): mixed
```












***


***
> Automatically generated on 2024-03-06
