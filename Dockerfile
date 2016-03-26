FROM cedvan/php-cli:7.0

# Install Git
RUN apt-get update -qq \
    && apt-get install -qqy git

# Install ZSH
RUN apt-get update -qq \
    && apt-get install -qqy zsh

# Install Om My Zsh
RUN wget https://github.com/robbyrussell/oh-my-zsh/raw/master/tools/install.sh -O - | bash

VOLUME /src

WORKDIR /src

ENTRYPOINT ["/bin/zsh"]
