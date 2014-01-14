require 'rake/packagetask'
require 'inifile'

task :default => [
  # 'php:unit',
  # 'jasmine:ci',
]

class PackageTask < Rake::PackageTask
  #def package_dir_path()
    #"#{package_dir}/#{@name}"
  #end
  #def package_name
    #@name
  #end

  #def basename
    #@version ? "#{@name}-#{@version}" : @name
  #end

  #def tar_bz2_file
    #"#{basename}.tar.bz2"
  #end
  #def tar_gz_file
    #"#{basename}.tar.gz"
  #end
  #def tgz_file
    #"#{basename}.tgz"
  #end
  #def zip_file
    #"#{basename}.zip"
  #end
    def get_version()
        ini = IniFile.load('theme.ini')
        section = ini['theme']
        theme_version = section['version']
        "#{theme_version}"
    end

end

PackageTask.new('astrolabe') do |p|
  p.version = p.get_version()
  p.need_tar_gz = true
  p.need_zip    = true

  p.package_files.include('README.md')
  p.package_files.include('LICENSE')
  p.package_files.include('plugin.*')
  p.package_files.include('*.php')
  p.package_files.include('css/*')
  p.package_files.include('images/*')
  p.package_files.include('javascripts/*')
end


task :version do
    puts get_version()
end
