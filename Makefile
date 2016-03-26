# ==================================== ENVIRONNEMENTS ==================================
MAKEFILE := $(abspath $(lastword $(MAKEFILE_LIST)))

define thismake
	$(MAKE) -sf $(MAKEFILE) $1
endef

# ======================================== MENU ========================================
.PHONY: all help
all: help
help:
	@echo ""
	@echo "-- Help Menu"
	@echo ""
	@echo "       - make install       Install"
	@echo "       - make start         Start application"
	@echo ""
	@echo ""

# ====================================== MEGA TASKS =====================================
.PHONY: install
install:
	@echo ""
	@echo "============================ Installating ============================"
	@echo ""
	@$(call thismake, check-binaries)
	@$(call thismake, build)
	@echo ""
	@echo "======================= Installed with success ======================="
	@echo ""

.PHONY: start
start:
	@echo "============================ Starting ============================"
	@docker run --rm -it -v $(PWD)/ddd:/src cedvan/ddd-day:latest

# ======================================== TASKS ========================================
.PHONY: check-binaries
check-binaries:
	@[ -f "$(shell which docker)" ] || echo "Error : docker is required, install it ! (https://docs.docker.com/engine/installation)"

.PHONY: build
build:
	@docker pull cedvan/composer:latest
	@docker build -t cedvan/ddd-day:latest .
	@docker run --rm -it \
		-v $(PWD)/ddd:/src \
		-v $(HOME)/.composer:/root/.composer \
		-v $(HOME)/.ssh:/root/.ssh \
		cedvan/composer:latest install
