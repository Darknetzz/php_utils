***

# Crypto

Crypto

A class to handle encryption and hashing

* Full name: `\Crypto`
* Parent class: [`\Base`](./Base.md)




## Methods


### genIV

Generates a random IV for the given encryption method

```php
public genIV(mixed $method): string
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$method` | **mixed** | The encryption method to use |


**Return Value:**

The generated IV




***

### encryptwithpw

Encrypt a string using a password, and optionally an IV

```php
public encryptwithpw(mixed $str, mixed $password, mixed $method = &#039;aes-256-cbc&#039;, mixed $iv = false): string
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$str` | **mixed** | The string to encrypt |
| `$password` | **mixed** | The password to use |
| `$method` | **mixed** | The encryption method to use. Defaults to aes-256-cbc |
| `$iv` | **mixed** | Whether to use an IV or not. Defaults to false |


**Return Value:**

The encrypted string




***

### decryptwithpw

Decrypt a string using a password, and optionally an IV

```php
public decryptwithpw(mixed $str, mixed $password, mixed $method = &#039;aes-256-cbc&#039;, mixed $iv = &#039;&#039;): string
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$str` | **mixed** | The string to decrypt |
| `$password` | **mixed** | The password to use |
| `$method` | **mixed** | The encryption method to use. Defaults to aes-256-cbc |
| `$iv` | **mixed** | Whether to use an IV or not. Defaults to &#039;&#039; |


**Return Value:**

The decrypted string




***

### hash

hash

```php
public hash(mixed $str, mixed $hash = &#039;sha512&#039;): string
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$str` | **mixed** | The string to hash |
| `$hash` | **mixed** | The hash method to use. Defaults to sha512 |


**Return Value:**

The hashed string




***


## Inherited methods


### __construct



```php
public __construct(): mixed
```












***


***
> Automatically generated on 2024-03-06
