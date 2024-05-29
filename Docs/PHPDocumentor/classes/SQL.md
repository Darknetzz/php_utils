***

# SQL

Class SQL

A class to handle SQL connections and queries

* Full name: `\SQL`
* Parent class: [`\Base`](./Base.md)




## Methods


### __construct



```php
public __construct(): mixed
```












***

### connectHost

connectHost

```php
public connectHost(string $host, string $user, string $pass): \mysqli
```

Connect to a host (without a database specified)






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$host` | **string** | The host to connect to |
| `$user` | **string** | The username to use |
| `$pass` | **string** | The password to use |


**Return Value:**

The mysqli object




***

### connectDB

connectDB

```php
public connectDB(string $host, string $user, string $pass, string $db = null): \mysqli
```

Connect to a database






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$host` | **string** | The host to connect to |
| `$user` | **string** | The username to use |
| `$pass` | **string** | The password to use |
| `$db` | **string** | The database to connect to, defaults to null |


**Return Value:**

The mysqli object




***

### executeQuery

executeQuery

```php
public executeQuery(string $statement, array $params = [], string $return = Null): void
```

Execute a query






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$statement` | **string** | The SQL statement to execute |
| `$params` | **array** | The parameters to bind to the statement |
| `$return` | **string** | The type of return to expect (id, array, object) |





***

### save_result

save_result

```php
public save_result(\mysqli_result $query): array
```

Save the result of a query to an array






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$query` | **\mysqli_result** | The query to save |


**Return Value:**

The result of the query




***

### error

error

```php
public error(): string
```

Get the last error from the SQL connection







**Return Value:**

The last error from the SQL connection




***

### setupDB



```php
public setupDB(mixed $sqlcon, mixed $templateArray): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$sqlcon` | **mixed** |  |
| `$templateArray` | **mixed** |  |





***


## Inherited methods


### __construct



```php
public __construct(): mixed
```












***


***
> Automatically generated on 2024-03-06
