class AppStorage {

	sotreToken(token){
		localStorage.setItem('token', token);
	}

	storeUser(user){
		localStorage.setItem('user', user);
	}

	store(user, token){
		this.sotreToken(token)
		this.storeUser(user);
	}

	clear(){
		localStorage.removeItem('token');
		localStorage.removeItem('user');
	}

	getToken(){
		return localStorage.getItem('token');
	}

	getUser(){
		return localStorage.getItem('user');
	}
}
export default AppStorage = new AppStorage();