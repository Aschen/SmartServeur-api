class CreateTables < ActiveRecord::Migration
  def change
    create_table :tables do |t|
      t.integer :numero_table

      t.timestamps null: false
    end
  end
end
