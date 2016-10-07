**Laravel Homestead Instructions**

When starting a new project

1. Remember to open up Homestead.yaml
2. Your project needs to be under the subdirectory of the mapped folder. In this case, /home/vagrant/Code
3. Then add site to sites, mapping it to an easily remembered .dev domain. Or .app domain.
	# map: fcc.dev
  # to: /home/vagrant/Code/FreeCodeCamp
4. Don't use tabs. Only space, or you'll get error
5. Edit your hosts file
6. Restart the host file
7. Call 'vagrant global-status' to get the status of your vagrant machine
8. Use 'vagrant provision' to refresh your provisioner and get the domains to work
9. To stop homestead, use 'vagrant halt'
10. To restart, use 'vagrant up'