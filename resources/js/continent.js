export default {  	
  	getContinents: function(){
  		return axios.get('/api/v2' + '/continents');
  	},

}