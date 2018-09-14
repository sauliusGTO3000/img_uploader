# Image Uploader

A simple web page for image uploading. Project is temporarily deployed on https://www.sauliusgto3000.lt until 9/19/2018

***Project was created using:***
  - Symfony 3.4.15 with Flex
  - SQLite
  - Bootstrap 4.1.3
  - Twig
  - Sass
  - Composer
  - Webpack
  - Encore
  - knp-paginator-bundle

### instructions to run the project ###
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
  3. Navigate to provided localhost address in your browser.
  
