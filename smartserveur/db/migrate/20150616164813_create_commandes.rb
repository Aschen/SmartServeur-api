class CreateCommandes < ActiveRecord::Migration
  def change
    create_table :commandes do |t|
      t.integer :quantite
      t.integer :produit_id
      t.integer :session_id

      t.timestamps null: false
    end
  end
end
