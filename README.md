# Tennis Refactoring Kata - PHP Version

## Installation du projet
```shell script
docker pull php:8.3-cli
docker pull composer/composer

make install
```

### QA
```shell script
make phpstan
make check-ecs
make fix-ecs
```