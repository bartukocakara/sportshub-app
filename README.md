<a name="readme-top"></a>

<!-- PROJECT LOGO -->
<br />
<div align="center">
    <img src="public/images/logo-color.png" alt="Logo" width="80" height="80">
  <h3 align="center">Sportshub</h3>

  <p align="center">
    <br />
    <br />
    <a href="https://islergucler.tardigrad.com.tr/sixt/skeleton"><strong>Dökümantasyon »</strong></a>
    <br />
    <br />
    ·
    <a href="https://islergucler.tardigrad.com.tr/sixt/skeleton/issues">Bug Bildir</a>
    ·
    <a href="https://islergucler.tardigrad.com.tr/sixt/skeleton/issues">Feature Talebi</a>
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Dökümantasyon</summary>
  <ol>
    <li>
      <a href="#proje-hakkinda">Proje Hakkında</a>
        <ul>
            <li><a href="#teknolojiler">Teknolojiler</a></li>
        </ul>
    </li>
    <li>
        <a href="#baslarken">Başlarken</a>
        <ul>
            <li><a href="#gereksinimler">Gereksinimler</a></li>
            <li><a href="#kurulum">Kurulum</a></li>
        </ul>
    </li>
    <li><a href="#dosya-olusturma">Dosya Oluşturma</a></li>
    <li><a href="#serviceProvider-atamasi">ServiceProvider Ataması</a></li>
    <li><a href="#cronjob-calistirma">Cronjoblar</a></li>
    <li>
        <a href="#testler">Testler</a>
        <ul>
            <li><a href="#testleri-calistirma">Testleri Çalıştırma</a></li>
            <li><a href="#test-filtreleme">Test Filtreleme</a></li>
        </ul>
    </li>
    <li>
        <a href="http://findeks.test/api/docs">Api Dökümantasyon</a>
    </li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## Proje Hakkında

<a name="proje-hakkinda"></a>
<br />

Bu uygulama sport tipi, maç, takım oluşturup sosyal ağ üzerinden spor tipi, maç, takım, oyuncu oluşturma amacıyla oluşturulmuştur.

<div align="right"><b><a href="#readme-top">↥ back to top</a></b></div>

### Teknolojiler

* Laravel
* Postgresql
* ...

<div align="right"><b><a href="#readme-top">↥ back to top</a></b></div>

<!-- GETTING STARTED -->

<a name="baslarken"></a>
<br />

## Başlarken

Projeyi ayağa kaldırmak için aşağıdaki adımları izleyebilirsiniz.

### Gereksinimler

Gereken teknolojiler ve kurulum linkleri. (macOS)
* PHP

  ```sh
  brew install php
  ```
* Composer

  ```sh
  brew install composer
  ```

### Kurulum

1. Proje clone

   ```sh
   git clone https://github.com/bartukocakara/laravel-sportshub
   ```
2. Paketleri yükleme

   ```sh
   composer install
   ```
   ```sh
   npm install
   ```
3. Env'yi kopyala ve bilgileri düzenle

   ```sh
   cp .env.example .env
   ```
4. Migration & Seeding

   ```sh
   php artisan migrate --seed
   php artisan db:seed --class=Database\Seeders\Court\CourtSubscriptionOwnerSeeder (WINDOWS)
   php artisan db:seed --class=Database\\Seeders\\Court\\CourtSubscriptionSeeder (MAC)  
   ```
   ```sh
   npm run prod
   ```
5. Migration specific table

   ```sh
   php artisan migrate --path=/database/migrations/2023_06_01_123456_create_table_name.php
   ```
   ```sh
   npm run prod
   ```

<div align="right"><b><a href="#readme-top">↥ back to top</a></b></div>

<a name="dosya-olusturma"></a>
<br />

## Dosya Oluşturma
* Controller -> Service -> Repository Pattern Oluşturma 
(XController, XServiceInterface, XService, XRepositoryInterface, XRepository,)
```sh
php artisan make:api-pattern x
```

* Controller (Bu komut App\Http\Controllers altında UserController.php oluşturur.)
```sh
php artisan make:controller-own user
```
* Service Interface (Bu komut App\Services\Interfaces altında UserServiceInterface.php oluşturur.)
```sh
php artisan make:interface user service
```
Kısa Kullanım
```sh
php artisan make:interface user s
```
* Service (Bu komut App\Services altında UserService.php oluşturur.)
```sh
php artisan make:service user
```
* Repository Interface (Bu komut App\Repository\Interfaces altında UserRepositoryInterface.php oluşturur.)
```sh
php artisan make:interface user repository
```
Kısa Kullanım
```sh
php artisan make:interface user r
```
* Repository (Bu komut App\Repository altında UserRepository.php oluşturur.)
```sh
php artisan make:repository user
```
Kısa Kullanım
```sh
php artisan make:repo user
```
* Filter (Bu komut App\Filters\UserFilters altında name alanı için Name.php oluşturur.)
```sh
php artisan make:filter user name
```
* Test (Bu komut tests\Feature\Controllers altında UserControllerTest.php oluşturur.)
```sh
php artisan make:test-own user
```

<div align="right"><b><a href="#readme-top">↥ back to top</a></b></div>

<a name="serviceProvider-atamasi"></a>
<br />

## ServiceProvider Ataması
* Yeni bir service provider oluşturun örneğin: MyServiceProvider gibi.
```sh
php artisan make:provider MyServiceProvider
```
* İçerisinde oluşturduğunuz interface ler bind ediliyor.
```php
public function register()
{
    $this->app->bind(UserServiceInterface::class, UserService::class);
    $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
}
```
* Oluşturduğunuz provider AppServiceProvider içerisinde register ediliyor.
```php
public function register()
{
    $this->app->register(
        MyServiceProvider::class,
    );
}
```

<div align="right"><b><a href="#readme-top">↥ back to top</a></b></div>

## Cronjoblar

Oluşturulan cronjobların çalıştırılması.

<a name="cronjob-calistirma"></a>
<br />

### Cronjobları Çalıştırma
```sh
php artisan schedule:work
```

<div align="right"><b><a href="#readme-top">↥ back to top</a></b></div>

## Testler

Oluşturulan testlerin çalıştırılması.

<a name="testleri-calistirma"></a>
<br />

### Testleri Çalıştırma
```sh
php artisan test
```

### Test Filtreleme
* User Controller test için filtreleme
```sh
php artisan test --filter=UserControllerTest
```

<div align="right"><b><a href="#readme-top">↥ back to top</a></b></div>

## 🔁 Payment Flow – Sequence Diagram

```mermaid
sequenceDiagram
    participant User
    participant Frontend (Vue/React)
    participant Backend (Laravel)
    participant PaymentService
    participant PaymentAdapter (Iyzico/Sipay)
    participant PaymentProvider API

    User->>Frontend (Vue/React): Selects court + time slot
    Frontend->>Backend (Laravel): Sends reservation + payment details
    Backend->>PaymentService: Initiates payment
    PaymentService->>PaymentAdapter: Delegates to correct adapter
    PaymentAdapter->>PaymentProvider API: Calls charge or init API
    PaymentProvider API-->>PaymentAdapter: Responds with success/redirect
    PaymentAdapter-->>PaymentService: Returns payment response
    PaymentService-->>Backend: Logs transaction + result
    Backend-->>Frontend: Sends response or redirect URL
    Frontend->>User: Redirects or shows confirmation

