require "sinatra"
require "slim"
require 'sinatra/activerecord'
require './config/environments' #database configuration
require './models/model'        #Model class

set :slim, :pretty => true

get '/' do
  erb :index
end

get '/tut0' do
	erb :tut0
end

get '/tut1' do 
	erb :tut1, :layout => :layout
end


after do
  # Close the connection after the request is done so that we don't
  # deplete the ActiveRecord connection pool.
  ActiveRecord::Base.connection.close
end