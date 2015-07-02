class ChangeTableIdInTableSession < ActiveRecord::Migration
  def change
    change_column :sessions, :table_id, :integer
  end
end
