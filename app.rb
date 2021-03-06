require "sinatra"
require 'sinatra/activerecord'
require "browser"
require "thin"
require './config/environments' #database configuration
require './models/model'        #Model class

get '/' do
  erb :index
end

get '/tut0' do
	@browser = Browser.new(:ua => request.user_agent, :accept_language => "en-us") 
	erb :tut0
end

get "/tut1" do 
	erb :tut1
end

get "/tut2" do 
	erb :tut2
end

get "/tut3" do 
  erb :tut3
end

get "/tut4" do 
  erb :tut4
end

after do
  # Close the connection after the request is done so that we don't
  # deplete the ActiveRecord connection pool.
  ActiveRecord::Base.connection.close
end

helpers do
  def h(text)
    Rack::Utils.escape_html(text)
  end
end