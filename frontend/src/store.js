import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
Vue.use(Vuex)

export default new Vuex.Store(
{
	plugins: [createPersistedState()],
	state:
	{
		user: 				localStorage.user_info,
		access_token: 		localStorage.getItem('access_token'),
		refresh_token: 		localStorage.getItem('refresh_token'),
		token_type: 		localStorage.getItem('token_type'),
		token_expire: 		localStorage.getItem('token_expire'),
        grant_type: 		"password",
        client_id: 			"2",
        client_secret: 		"XaMNg68ymQ8fmcQLulnCBIco7l7IXfXYwyfrozsO",
	},
	mutations:
	{
		login (state, data)
		{
			state.access_token 		= data.access_token;
			state.refresh_token 	= data.refresh_token;
			state.token_type 		= data.token_type;
			state.token_expire 		= data.token_expire;

			localStorage.setItem('access_token', data.access_token);
			localStorage.setItem('refresh_token', data.refresh_token);
			localStorage.setItem('token_type', data.token_type);
			localStorage.setItem('token_expire', data.token_expire);

			
		},
		logout(state)
		{
			state.access_token 		= null;
			state.refresh_token 	= null;
			state.token_type 		= null;
			state.token_expire 		= null;
			state.user 				= null;

			localStorage.removeItem('user_info');
			localStorage.removeItem('access_token');
			localStorage.removeItem('refresh_token');
			localStorage.removeItem('token_type');
			localStorage.removeItem('token_expire');

			
		},
		store_user(state, user)
		{
			state.user = user;
			localStorage.setItem('user_info', user);
		}
	},
	actions:
	{
	}
})