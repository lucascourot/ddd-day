DDD-Day
===

Installation
---

### Vagrant and Ansible
1. Install [Vagrant](https://www.vagrantup.com/)
2. Install [Ansible](https://docs.ansible.com/ansible/intro_installation.html) (with pip)
3. Clone this project
4. Run `vagrant up` in the ddd-day folder.
5. Run `vagrant ssh` and go to `/var/www/ddd` directory

### Local machine and Ansible
1. Bad idea (except if you are on Debian 8)
2. Clone this project
3. Run `ansible-playbook -i ansible/hosts ansible/build.yml -l dev`

### Local machine and your hands
1. Install PHP 7
2. Add composer (global)
3. Clone this project
4. Go to the project folder and run `composer install`

Local config (for Vagrant)
---

If you want to add your local .gitconfig or composer.auth to the VirtualMachine, you should create a `Vagrantfile` in
`~.vagrant.d/` and add this:

```
Vagrant.configure("2") do |config|

    if Vagrant.has_plugin?("vagrant-cachier")
      config.cache.scope = :machine

      config.cache.synced_folder_opts = {
        type: :nfs,
        mount_options: ['rw', 'vers=3', 'tcp', 'nolock']
      }

      config.cache.enable :generic
    end

    # Git
    if File.exists?(File.join(Dir.home, '.gitconfig')) then
      config.vm.provision :file do |file|
        file.source      = '~/.gitconfig'
        file.destination = '/home/vagrant/.gitconfig'
      end
    end

    # Composer
    if File.exists?(File.join(Dir.home, '.composer/auth.json')) then
      config.vm.provision :file do |file|
        file.source      = '~/.composer/auth.json'
        file.destination = '/home/vagrant/.composer/auth.json'
      end
    end

end
```

### Docker

```
make install
make start
```
