Anonym-Database-Tools
======================


Burada Migration ve backup ara�lar�n� bulacaks�n�z, bu ara�lar normal kullan�m i�in de�il, konsol uygulamalar� ile kullan�lmak
i�in tasarlanm��t�r.

Kullan�m i�in

```php

define('MIGRATION', 'migrationDosyalar�n�nbuluanaca��konum');
define('MIGRATION_NAMESPACE', 'MIGRATION\SAHIP\OLACA�I\NAMESPACE\\');

```

// yapt�ktan sonra composer.json dosyas�na

```json

"MIGRATION\SAHIP\OLACA�I\NAMESPACE\\":"migrationDosyalar�n�nbuluanaca��konum";

```


eklemeniz gerek.