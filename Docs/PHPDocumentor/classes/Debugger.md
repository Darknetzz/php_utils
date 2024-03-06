***

# Debugger

Debugger

A class to handle debugging and logging

* Full name: `\Debugger`



## Properties


### verbose



```php
public bool $verbose
```






***

### vars



```php
private $vars
```






***

## Methods


### __construct

__construct

```php
public __construct(mixed $verbose = false): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$verbose` | **mixed** |  |





***

### format

format

```php
public format(mixed $input, mixed $type = &#039;info&#039;): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$input` | **mixed** |  |
| `$type` | **mixed** |  |





***

### output

output
prints formatted output and echoes it

```php
public output(mixed $txt, mixed $type = &#039;info&#039;, mixed $die = false): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$txt` | **mixed** |  |
| `$type` | **mixed** |  |
| `$die` | **mixed** |  |





***

### debug_log

debug_log

```php
public debug_log(mixed& $debug_array, mixed $txt, mixed $title = null): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$debug_array` | **mixed** |  |
| `$txt` | **mixed** |  |
| `$title` | **mixed** |  |





***

### debug_print

debug_print

```php
public debug_print(mixed& $debug_array, mixed $tableName = &quot;Debug&quot;): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$debug_array` | **mixed** |  |
| `$tableName` | **mixed** |  |





***

### throw_exception



```php
public throw_exception(mixed $message): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$message` | **mixed** |  |





***


***
> Automatically generated on 2024-03-06
