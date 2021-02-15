## Телефонная книга

Веб интерфейс и методы api для просмотра, редактирования, добавления и удаления телефонных контактов.

## settings

- .env.example нужно скопировать в .env и задать настройки подключения к БД и настройки отправки почты(для функции восстановления пароля).
- в корневой директории проекта выполнить php artisan migrate
- в корневой директории проекта выполнить php artisan key:generate
- в корневой директории проекта выполнить php artisan serve(для запуска приложения)

## Web

url приложения http://127.0.0.1:8000. Для доступа нужно будет зарегистриваться.

### Api

- Login: метод:POST, URL:http://127.0.0.1:8000/api/login (params: email, password)
- Register: метод:POST, URL:http://127.0.0.1:8000/api/register (params: name, email, password, c_password)
- List: метод:GET, URL:http://127.0.0.1:8000/api/contacts
- Create: метод:POST, URL:http://127.0.0.1:8000/api/contacts (params: fio, phone)
- Show: метод:GET, URL:http://127.0.0.1:8000/api/contacts/{id}
- Update: метод:PUT, URL:http://127.0.0.1:8000/api/contacts/{id} (params: fio, phone)
- Delete: метод:DELETE, URL:http://127.0.0.1:8000/api/contacts/{id}

При регистрации api/register возвращается токен, его еще можно получить методом api/login передав логин и пароль пользователя.
В методах работы с контактами необходимо передавать полученный токен в Headers в поле Authorization. Например Authorization Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1...
