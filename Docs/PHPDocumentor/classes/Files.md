***

# Files

Class Files

This class provides utility methods for working with files.

* Full name: `\Files`
* Parent class: [`\Base`](./Base.md)




## Methods


### include_folder

include_folder

```php
public include_folder(mixed $fullpath, mixed $except): mixed
```

Include all files in a folder, except those in the $except array






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$fullpath` | **mixed** | The full path to the folder |
| `$except` | **mixed** | An array of files to exclude |





***

### is_file

is_file

```php
public is_file(mixed $fullpath): bool
```

Check if a file exists and is a file






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$fullpath` | **mixed** | The full path to the file |


**Return Value:**

True if the file exists and is a file, false otherwise




***

### file_close

file_close

```php
public file_close(mixed $handle, mixed $attempts = 3): bool
```

Close a file handle






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$handle` | **mixed** | The file handle to close |
| `$attempts` | **mixed** | The number of attempts to close the file handle |


**Return Value:**

True if the file handle was closed, false otherwise




***

### file_read

file_read

```php
public file_read(mixed $fullpath): string|null
```

Read a file






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$fullpath` | **mixed** | The full path to the file |


**Return Value:**

The contents of the file, or null if the file is empty




***

### file_write_access

file_write_access

```php
public file_write_access(mixed $fullpath): bool
```

Check if a file has write access






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$fullpath` | **mixed** | The full path to the file |


**Return Value:**

True if the file has write access, false otherwise




***

### file_write

file_write

```php
public file_write(mixed $fullpath, mixed $content, mixed $create = true): string|bool
```

Write to a file






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$fullpath` | **mixed** | The full path to the file |
| `$content` | **mixed** | The content to write to the file |
| `$create` | **mixed** | Whether to create the file if it does not exist. Defaults to true |


**Return Value:**

The content written to the file, or false if the file does not exist and $create is false




***

### file_delete

file_delete

```php
public file_delete(mixed $fullpath): bool
```

Delete a file






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$fullpath` | **mixed** | The full path to the file |


**Return Value:**

True if the file was deleted, false otherwise




***

### file_is_empty

file_is_empty

```php
public file_is_empty(mixed $fullpath): bool
```

Check if a file is empty






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$fullpath` | **mixed** | The full path to the file |


**Return Value:**

True if the file is empty, false otherwise




***

### currentFileName

currentFileName

```php
public currentFileName(bool $ext = True): string
```

Get the current file name






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$ext` | **bool** | Whether to include the file extension. Defaults to true |


**Return Value:**

The current file name




***

### preventDirect

preventDirect

```php
public preventDirect(mixed $exceptions = [], mixed& $pagevar = null, mixed $callback = null): void
```

Prevents direct invokation of a script - except $exceptions






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$exceptions` | **mixed** |  |
| `$pagevar` | **mixed** |  |
| `$callback` | **mixed** |  |





***


## Inherited methods


### __construct



```php
public __construct(): mixed
```












***


***
> Automatically generated on 2024-03-06
