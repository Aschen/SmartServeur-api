class Order < ActiveRecord::Base
  belongs_to  :product
  belongs_to  :session
end
