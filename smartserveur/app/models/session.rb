class Session < ActiveRecord::Base
  has_many  :sessions
  belongs_to  :table
end
