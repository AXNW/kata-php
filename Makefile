args = `arg="$(filter-out $@,$(MAKECMDGOALS))" && echo $${arg:-${1}}`
CUR_DIR = $(CURDIR)
USER_ID = $(shell id -u)
GROUP_ID = $(shell id -g)
COMPOSER_RUN = docker run --rm --interactive --tty --volume $(CUR_DIR):/app --user $(USER_ID):$(GROUP_ID) composer/composer

## Project commands.
install:
	$(COMPOSER_RUN) install
phpstan:
	$(COMPOSER_RUN) phpstan
check-ecs:
	$(COMPOSER_RUN) check-cs
fix-ecs:
	$(COMPOSER_RUN) fix-cs

.PHONY: install phpstan check-ecs fix-ecsrm