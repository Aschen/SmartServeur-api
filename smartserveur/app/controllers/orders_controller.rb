class OrdersController < ApplicationController
  before_action :set_order, only: [:show, :edit, :update, :destroy]


  # GET /orders/from_table/1
  def from_table
    @orders = Order.joins(session: :table).where("table_id = ? AND served = ? AND expired = ?", params[:table_id], false, false)
    render json: @orders
  end

    # GET /orders/from_table/1/all
    def from_table_all
      @orders = Order.joins(session: :table).where("table_id = ? AND expired = ?", params[:table_id], false)
      render json: @orders
    end


  # GET /orders
  # GET /orders.json
  def index
    @orders = Order.all
  end

  # GET /orders/1
  # GET /orders/1.json
  def show
  end

  # GET /orders/new
  def new
    @order = Order.new
  end

  # GET /orders/1/edit
  def edit
  end

  # POST /orders
  # POST /orders.json
  def create
    @order = Order.new(order_params)

    respond_to do |format|
      if @order.save
        format.html { redirect_to @order, notice: 'Order was successfully created.' }
        format.json { render :show, status: :created, location: @order }
      else
        format.html { render :new }
        format.json { render json: @order.errors, status: :unprocessable_entity }
      end
    end
  end

  # PATCH/PUT /orders/1
  # PATCH/PUT /orders/1.json
  def update
    respond_to do |format|
      if @order.update(order_params)
        format.html { redirect_to @order, notice: 'Order was successfully updated.' }
        format.json { render :show, status: :ok, location: @order }
      else
        format.html { render :edit }
        format.json { render json: @order.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /orders/1
  # DELETE /orders/1.json
  def destroy
    @order.destroy
    respond_to do |format|
      format.html { redirect_to orders_url, notice: 'Order was successfully destroyed.' }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_order
      @order = Order.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def order_params
      if !params.has_key?("utf8")
        params[:order] = {}
        params[:order][:quantity] = params[:quantity]
        params[:order][:session_id] = params[:session_id]
        params[:order][:product_id] = params[:product_id]
        params[:order][:served] = params[:served]
      end
      params.require(:order).permit(:quantity, :session_id, :product_id, :served)
    end
end
