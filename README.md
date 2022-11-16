Table structure 

1. user: username, passhash and email
2. materials: title, message, img_src for image link, user_id

Features:

1. register user, login user, forget user (delete account), edit own email, edit own password, private area
2. view common gallery, view gallery by username, view full picture, remove own pictures
3. Russian/english localization (/messages/{ru,en})

This is just draft - in database passhash stores as sha1. Don't do it in real projects


====

Структура таблиц

1. Пользователь user: никнейм username, хеш пароля passhash и электропочта email
2. Таблица material: заголовок материала title, текст описания message, ссылка на картинку img_src,
и внешний ключ user_id для связи с таблицей пользователи

Функции:

1. Регистрация, вход, забыть (удаление аккаунта), правка почты, смена пароля, личный кабинет
2. Просмотр общей галереи, просмотр галереи по имени пользователя, просмотр полного описания картинки, удаление
своего материала
4. Локализация (русский/английский в /messages/{ru,en} )

Это не более, чем черновик - пароль в базе хранится в sha1. Не делайте так в реальных проектах
