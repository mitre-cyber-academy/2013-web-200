package "apache2" do
  action :install
end

package "php5" do
  action :install
end

bash "clear_var" do
  user "root"
  cwd "/var"
  code <<-EOH
    rm -rf www
  EOH
end

remote_directory "/var/www" do
  source "www"
  owner "root"
  group "root"
end

service "apache2" do
  supports :start => true, :stop => true, :restart => true
  action :restart
end