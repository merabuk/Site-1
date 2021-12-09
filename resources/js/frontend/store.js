let store = {
	state: {
		cart: [],
		cartCount: 0,
		allCartCount: 0,
		allCost: 0,
	},

	mutations: {
		add(state, item) {
			state.cart.push(item);
			state.cartCount = state.cart.length;
		},
		clear(state) {
			state.cart = [];
            state.cartCount = 0;
            state.allCartCount = 0;
            state.allCost = 0;
		},
		total(state, arg) {
			state.allCartCount = arg.count;
			state.allCost = arg.cost;
		}
	},
};

export default store;
