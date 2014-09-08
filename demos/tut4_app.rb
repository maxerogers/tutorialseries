require "sinatra"

require "sqlite3"
require "sinatra-activerecord"

get "/" do
	"hello world"
end
get "/form" do
	puts "GET"
	'<h3>Data:</h3>
	<form method="post" action="/form">
		<input type="text" name="data">
		<input type="submit" value="submit">
	</form>'
end
post "/form" do
	puts "POST"
	puts params.inspect
	'<h3>Data: '+params[:data]+' </h3>
	<form method="post" action="/form">
		<input type="text" name="data">
		<input type="submit" value="submit">
	</form>'
end
# builds the SQLite3 database and attaches it to the Sintra app
configure :development do
	set :database, {adapter: "sqlite3", database: "db/database.sqlite3"}
end
# Builds the ActiveRecord ORM class. You don't have to declare the instance variables
# instead they are handled by the db migrations and ActiveRecord looks them up in the table
# when you first boot up. This is to avoid duplication.
# So the class declaration is here to build class methods and conditions.
# Like the toString method or conditions to ensure attribute X isn't nil
class Post < ActiveRecord::Base
	#
end
