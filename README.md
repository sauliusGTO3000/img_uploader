# img_uploader

instructions to run the project:
  1. clone the project
  
     ```
     git clone https://github.com/sauliusGTO3000/img_uploader.git
     ```
     
  2. inside project directory, run the following:
  
      ```
      composer install
      ```
      ```
      php bin/console doctrine:database:create
      ```
      ```
      php bin/console doctrine:schema:create
      ```
      ```
      yarn install
      ```
      ```
      yarn encore dev
      ```
      ```
      php bin/console server:run
      ```
