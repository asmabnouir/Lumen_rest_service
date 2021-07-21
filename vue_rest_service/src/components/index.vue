<template>
	<div class="container">
		<h1 class="title">Lumen Rest service</h1>
		<div class="mini-container">
			<div v-if="display === 0" @click="getClients(), (display = 1)">
				<a>Get Client List</a>
			</div>
			<div id="ListClients" v-if="display === 1">
				<h4>Clients :</h4>
				<div v-for="client in clients" :key="client.id">
					<a
						@click="
							(display = 2),
								getClient(client.id),
								getContractsOfOneClient(client.id)
						"
					>
						{{ client.lastName }}{{ client.firstName }}</a
					>
				</div>
			</div>
			<div v-else-if="display === 2">
				<div>
					<a @click="getClients(), (display = 1)">back</a>
				</div>
				<div>
					<ul>
						<li>ClientId : {{ client.id }}</li>
						<li>Name : {{ client.lastName }}{{ client.firstName }}</li>
						<li>Street : {{ client.street }}</li>
						<li>Number : {{ client.number }}</li>
						<li>Zip : {{ client.number }}</li>
						<li>City : {{ client.city }}</li>
					</ul>
					<ul>
						<h3>Contracts :</h3>
						<li v-for="contract in contracts" :key="contract.id">
							Contrat id : {{ contract.id }}
							<button @click="getContractById(contract.id), (display = 3)">
								Edit
							</button>
						</li>
					</ul>
				</div>
			</div>
			<form v-else-if="display === 3" @submit.prevent="editContract()">
				<a @click="getClients(), (display = 1)">back</a>
				<div class="inputs">
					<label>Energy </label>
					<input type="string" v-model="contract.energy" />

					<label>Product</label>
					<input type="text" v-model="contract.product" />

					<label>Gsrn</label>
					<input v-model="contract.gsrn" type="text" />

					<label>Duration</label>
					<input v-model="contract.duration" type="numbe" />

					<label>CodePromo</label>
					<input v-model="contract.codePromo" type="text" />

					<button type="submit">save</button>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
import axios from "axios";
export default {
	data() {
		return {
			clients: {},
			client: {},
			contracts: {},
			contract: {
				energy: "",
				product: "",
				gsrn: "",
				duration: 0,
				codePromo: "",
			},
			display: 0,
		};
	},
	methods: {
		getClients: function () {
			axios
				.get("https://bennouirasma.com/lumen_rest_service/public/clients")
				.then((response) => (this.clients = response.data));
		},
		getClient: function (ClientId) {
			axios
				.get(
					"https://bennouirasma.com/lumen_rest_service/public/client/" +
						ClientId
				)
				.then((response) => (this.client = response.data));
		},
		getContractsOfOneClient: function (ClientId) {
			axios
				.get(
					"https://bennouirasma.com/lumen_rest_service/public/client/" +
						ClientId +
						"/contracts"
				)
				.then((response) => (this.contracts = response.data));
		},
		getContractById: function (contractId) {
			axios
				.get(
					"https://bennouirasma.com/lumen_rest_service/public/contract/" +
						contractId
				)
				.then((response) => (this.contract = response.data));
		},

		editContract: function () {
			axios
				.put("http://127.0.0.1:8000/update", this.contract)
				.then((response) => console.log(response));
		},
	},
};
</script>

<style scoped>
body {
	overflow: hidden;
}

.container {
	font-family: sans-serif;
	width: 100vw;
	height: 100vh;
	display: flex;
	flex-direction: column;
	justify-content: space-around;
	align-items: center;
}
.mini-container {
	display: flex;
	align-items: center;
	flex-direction: column;
	width: 60%;
	height: 70vh;
	border-radius: 20px;
	padding: 40px;
	box-sizing: border-box;
	background: #ecf0f3;
	box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
}
.li {
	margin-top: 1%;
}
.title {
	text-align: center;
	font-size: 1.8rem;
	color: #1da1f2;
}

.inputs {
	text-align: left;
	margin-top: 30px;
}

label,
input,
button {
	display: block;
	width: 100%;
	padding: 0;
	border: none;
	outline: none;
	box-sizing: border-box;
}

label {
	margin-bottom: 4px;
}

label:nth-of-type(2) {
	margin-top: 12px;
}

input::placeholder {
	color: gray;
}

input {
	background: #ecf0f3;
	padding: 10px;
	padding-left: 20px;
	height: 50px;
	font-size: 14px;
	border-radius: 50px;
	box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
}

button {
	margin-top: 20px;
	background: #1da1f2;
	height: 40px;
	border-radius: 20px;
	cursor: pointer;
	font-weight: 900;
	box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
	transition: 0.5s;
}

button:hover {
	box-shadow: none;
}

a {
	font-size: 1.2rem;
	text-decoration: none;
	color: black;
	padding: 2px;
}
a:hover {
	color: #1da1f2;
	cursor: pointer;
}
</style>
