Необходимо реализовать клиент-серверное приложение с
любым стеком технологий на языках РНР и JS. Использовать РНР для
бэка (желательнее Yii2):
1. Реализовать АРI на со следующими сущностями:
   - Пользователи (id, email, имя, номер телефона, пароль в
   зашифрованном виде).
2. Реализовать UI для вывода данных с АРI на VueJS/React/Angular.

Уточнение: в качестве СУБД использовать Postgres.

---
1. Install with [npm](https://www.npmjs.com/):
```
$ composer install

$ cd ./frontend 
$ npm install
```
2. Creating db:
```
$ createdb yii2api
```
3. Migrating and seeding:
```
$ php yii migrate
$ php yii seed/seed-test-user
$ php yii seed/seed-users
```
4. Setting up REST API url
```
$ cd ./frontend
$ cp .env.example .env
```
.env:
```
VITE_API_ENDPOINT=
```

---
![demo-gif](/repoimages/gif-image.gif)
---
![backend-tree](/repoimages/modules_tree.png)
---
![frontend-tree](/repoimages/frontend_tree.png)
