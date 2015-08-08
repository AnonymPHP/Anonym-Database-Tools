Anonym-Database-Tools
======================


Burada Migration ve backup araçlarýný bulacaksýnýz, bu araçlar normal kullaným için deðil, konsol uygulamalarý ile kullanýlmak
için tasarlanmýþtýr.

Kullaným için

```php

define('MIGRATION', 'migrationDosyalarýnýnbuluanacaðýkonum');
define('MIGRATION_NAMESPACE', 'MIGRATION\SAHIP\OLACAÐI\NAMESPACE\\');

```

// yaptýktan sonra composer.json dosyasýna

```json

"MIGRATION\SAHIP\OLACAÐI\NAMESPACE\\":"migrationDosyalarýnýnbuluanacaðýkonum";

```


eklemeniz gerek.