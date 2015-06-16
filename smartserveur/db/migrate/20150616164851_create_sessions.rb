class CreateSessions < ActiveRecord::Migration
  def change
    create_table :sessions do |t|
      t.integer :numero_table
      t.boolean :expire

      t.timestamps null: false
    end
  end
end
