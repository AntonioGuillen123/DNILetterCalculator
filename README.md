# 📄 Welcome to my DNI Letter Calculator

The DNI Letter Calculator API is a RESTful web service designed to calculate the corresponding letter for a Spanish DNI (Documento Nacional de Identidad) based on the given numerical identifier. This API implements the official algorithm for determining the DNI letter and provides endpoints for input validation and calculation.


## 🛠️🚀 Tech Stack
- **Frameworks:** Laravel
- **Server:** Xampp, Apache, Nodejs
- **Database:** Mysql
- **Others:** Composer, Postman, JIRA

## 📊📁 DB Diagram
Below is a diagram of the database:

![image](https://res.cloudinary.com/dierpqujk/image/upload/v1735062439/dnitletter_rcgzji.png)


## 🔧⚙️ Installation
- Clone repository
```
git clone https://github.com/AntonioGuillen123/DNILetterCalculator
```

- Install Composer dependencies

```
composer install
```
- Install Nodejs dependencies

```
npm install
```
- Duplicate .env.example file and rename to .env
- In this new .env, change the variables you need, but it is very important to uncomment the database connection lines that are these:
 
In DB_CONNECTION will come mysqlite, change it to the bd you use (in this case MySQL)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dni_letter_calculator
DB_USERNAME=root
DB_PASSWORD=
```
 - Generate an App Key with this command 
```
php artisan key:generate 
```

- Execute migrations with seeders
```
php artisan migrate --seed
```

## ▶️💻 Run Locally
- How to run the Laravel server  
```
php artisan serve
```

- If you want to run all this in development environment run the following command  
```
npm run dev
```

- For production you should run the following command 
```
npm run build
```

## 🏃‍♂️🧪 Running Tests

To run test you should uncomment the following lines on the phpunit.xml file.

![image](https://res.cloudinary.com/dierpqujk/image/upload/v1733829455/imagen_2024-12-10_121742908_b3mfqm.png)


With the following command we run the tests and we will also generate a coverage report

```bash
  php artisan test --coverage-html=coverage-report
```

If everything is correct, everything should be OK.

![image](https://res.cloudinary.com/dierpqujk/image/upload/v1735062581/imagen_2024-12-24_184952392_cz8k8g.png)


A folder called coverage-report will also have been generated with **100%** coverage.
![image](https://res.cloudinary.com/dierpqujk/image/upload/v1738332264/imagen_2025-01-31_150422424_oh6wao.png)

## 📡🌐 DNI Letter Calculator API

This API calculates the corresponding letter for a Spanish DNI (Documento Nacional de Identidad) based on the official modulo-23 algorithm. It validates input and ensures accurate letter determination, allowing seamless integration with other applications. The API is designed for JSON-based communication and supports error handling for invalid data.

### Dni Letter

#### Calculate the DNI from number

```http
  POST /api/dniCalculator
```

### 🔹Request

#### Header:

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Accept`      | `string` | Must be **application/json**    |

#### Body: 

| Parameter | Type     | Description                    |
| :-------- | :------- | :-------------------------     |
| `dni`    | `integer` | **Required**. DNI number between 0 and 99999999    |


### 🔹Response

- **Status Code:** 200, 422
- **Content Type:** application/json



## ✍️🙍 Author
- **Antonio Guillén:**  [![GitHub](https://img.shields.io/badge/GitHub-Perfil-black?style=flat-square&logo=github)](https://github.com/AntonioGuillen123)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Perfil-blue?style=flat-square&logo=linkedin)](https://www.linkedin.com/in/antonio-guill%C3%A9n-905b941ab)
[![Correo](https://img.shields.io/badge/Email-Contacto-red?style=flat-square&logo=gmail)](mailto:antonioguillengarcia123@gmail.com)