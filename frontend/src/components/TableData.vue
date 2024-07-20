<template>
<div class="card">
    <table>
        <thead>
            <tr>
                <th>
                    Name
                    <div class="input-wrapper">
                        <input type="text" v-model="filters.name.value" @input="applyFilters" placeholder="Search by name" />
                    </div>
                </th>
                <th>
                    Country
                    <div class="input-wrapper">
                        <input type="text" v-model="filters['country.name'].value" @input="applyFilters" placeholder="Search by country" />
                    </div>
                </th>
                <th>
                    Agent
                    <select v-model="filters.representative.value" @change="applyFilters">
                        <option v-for="rep in representatives" :key="rep.name" :value="rep.name">{{ rep.name }}</option>
                    </select>
                </th>
                <th>
                    Status
                    <select v-model="filters.status.value" @change="applyFilters">
                        <option v-for="status in statuses" :key="status" :value="status">{{ status }}</option>
                    </select>
                </th>
                <th>
                    Verified
                    <input type="checkbox" v-model="filters.verified.value" @change="applyFilters" />
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="customer in filteredCustomers" :key="customer.id">
                <td>{{ customer.name }}</td>
                <td>{{ customer.country.name }}</td>
                <td>{{ customer.representative.name }}</td>
                <td>{{ customer.status }}</td>
                <td>
                    <i class="pi" :class="{'pi-check-circle text-green-500': customer.verified, 'pi-times-circle text-red-400': !customer.verified }"></i>
                </td>
            </tr>
        </tbody>
    </table>
    <div v-if="loading">Loading customers data. Please wait.</div>
    <div v-else-if="filteredCustomers.length === 0">No customers found.</div>
</div>
</template>

<script>
export default {
    name: 'TableData',
    data() {
        return {
            customers: [],
            filteredCustomers: [],
            filters: {
                global: {
                    value: null
                },
                name: {
                    value: null
                },
                'country.name': {
                    value: null
                },
                representative: {
                    value: null
                },
                status: {
                    value: null
                },
                verified: {
                    value: null
                }
            },
            representatives: [{
                    name: 'Amy Elsner',
                    image: 'amyelsner.png'
                },
                {
                    name: 'Anna Fali',
                    image: 'annafali.png'
                },
                {
                    name: 'Asiya Javayant',
                    image: 'asiyajavayant.png'
                },
                {
                    name: 'Bernardo Dominic',
                    image: 'bernardodominic.png'
                },
                {
                    name: 'Elwin Sharvill',
                    image: 'elwinsharvill.png'
                },
                {
                    name: 'Ioni Bowcher',
                    image: 'ionibowcher.png'
                },
                {
                    name: 'Ivan Magalhaes',
                    image: 'ivanmagalhaes.png'
                },
                {
                    name: 'Onyama Limba',
                    image: 'onyamalimba.png'
                },
                {
                    name: 'Stephen Shaw',
                    image: 'stephenshaw.png'
                },
                {
                    name: 'XuXue Feng',
                    image: 'xuxuefeng.png'
                }
            ],
            statuses: ['unqualified', 'qualified', 'new', 'negotiation', 'renewal', 'proposal'],
            loading: true
        };
    },
    mounted() {
        this.fetchCustomers();
    },
    methods: {
        fetchCustomers() {
            // Simulating a service call
            setTimeout(() => {
                const data = [
                    // Sample data
                    {
                        id: 1,
                        name: 'John Doe',
                        country: {
                            name: 'USA',
                            code: 'us'
                        },
                        representative: {
                            name: 'Amy Elsner',
                            image: 'amyelsner.png'
                        },
                        status: 'new',
                        verified: true
                    },
                    {
                        id: 2,
                        name: 'Jane Smith',
                        country: {
                            name: 'Germany',
                            code: 'de'
                        },
                        representative: {
                            name: 'Anna Fali',
                            image: 'annafali.png'
                        },
                        status: 'qualified',
                        verified: false
                    },
                    {
                        id: 3,
                        name: 'Jaden Smith',
                        country: {
                            name: 'Italy',
                            code: 'de'
                        },
                        representative: {
                            name: 'Anil Shekh',
                            image: 'annafali.png'
                        },
                        status: 'qualified',
                        verified: false
                    },
                    {
                        id: 4,
                        name: 'Katy Perch',
                        country: {
                            name: 'France',
                            code: 'de'
                        },
                        representative: {
                            name: 'Harry Depp',
                            image: 'annafali.png'
                        },
                        status: 'unqualified',
                        verified: false
                    },
                    // Add more sample data here...
                ];
                this.customers = this.getCustomers(data);
                this.filteredCustomers = this.customers;
                this.loading = false;
            }, 1000);
        },
        getCustomers(data) {
            return data.map(d => {
                d.date = new Date(d.date);
                return d;
            });
        },
        applyFilters() {
            this.filteredCustomers = this.customers.filter(customer => {
                return (
                    (!this.filters.global.value || customer.name.toLowerCase().includes(this.filters.global.value.toLowerCase()) ||
                        customer.country.name.toLowerCase().includes(this.filters.global.value.toLowerCase()) ||
                        customer.representative.name.toLowerCase().includes(this.filters.global.value.toLowerCase()) ||
                        customer.status.toLowerCase().includes(this.filters.global.value.toLowerCase())) &&
                    (!this.filters.name.value || customer.name.toLowerCase().startsWith(this.filters.name.value.toLowerCase())) &&
                    (!this.filters['country.name'].value || customer.country.name.toLowerCase().startsWith(this.filters['country.name'].value.toLowerCase())) &&
                    (!this.filters.representative.value || customer.representative.name === this.filters.representative.value) &&
                    (!this.filters.status.value || customer.status === this.filters.status.value) &&
                    (this.filters.verified.value === null || customer.verified === this.filters.verified.value)
                );
            });
        }
    }
};
</script>

<style scoped>
.card {
    margin: 10px;
    padding: 1rem;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.flex {
    display: flex;
}

.justify-end {
    justify-content: flex-end;
}

.icon-field {
    position: relative;
}

.input-wrapper {
    margin: 4px 0;
    padding: 0px 8px;
    border: 0.25px solid #c7c1c180;
    border-radius: 0.375rem;
    background-color: #ffffff;
    display: flex;
    align-items: center;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
}

.input-wrapper input {
    border: none;
    font-size: 16px;
    width: 100%;
    padding: 8px;
    background-color: #ffffff;
}

.input-wrapper input:focus {
    outline: none;
    box-shadow: none;
    background-color: #ffffff;
}

.input-icon {
    position: absolute;
    top: 50%;
    left: 0.5rem;
    transform: translateY(-50%);
    color: #6b7280;
}

.input-text {
    padding-left: 2rem;
    padding-right: 0.5rem;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    width: 100%;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
}

th,
td {
    border: 1px solid #e5e7eb;
    padding: 0.75rem;
    text-align: left;
}

th {
    background-color: #f3f4f6;
}

.pi {
    font-size: 1.25rem;
}

.text-green-500 {
    color: #10b981;
}

.text-red-400 {
    color: #f87171;
}
</style>
