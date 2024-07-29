<template>
    <div class="card">
        <div class="table-top">
            <PageTitle title="Employees" />
            <div class="toolbar">
              <AddBtn />
            </div>
        </div>
      <div class="list-employee">
        <TableComponent :formTitle="'List of Employees'" :headers="headers" :rows="employeeRows">
          <template v-slot:cell-9="{ row, rowIndex }">
            <button class="edit-btn" @click="editEmployee(rowIndex)">Edit</button>
            <button class="delete-btn" @click="deleteEmployee(rowIndex)">Delete</button>
          </template>
        </TableComponent>
      </div>
    </div>
  </template>
  
  <script>
  import AddBtn from '@/components/AddBtn.vue';
  import TableComponent from '@/components/TableComponent.vue';
  import MFormTitle from '@/components/MenuFormComponents/MFormTitle.vue';
  import MFormInput from '@/components/MenuFormComponents/MFormInput.vue';
  import MFormAddBtn from '@/components/MenuFormComponents/MFormAddBtn.vue';
  import PageTitle from '@/components/PageTitle.vue';
  import { ref, onMounted, computed } from 'vue';
  import axios from 'axios';
  
  const api = axios.create({
    baseURL: 'http://127.0.0.1:8000/api',
    headers: {
      'X-Requested-With': 'XMLHttpRequest',
      'Content-Type': 'application/json',
    },
  });
  
  export default {
    name: 'AdminEmployee',
    components: {
      PageTitle,
      MFormTitle,
      MFormInput,
      MFormAddBtn,
      TableComponent,
      AddBtn,
    },
    setup() {
      const newEmployee = ref({
        name: '',
        email: '',
        position: '',
      });
      const employees = ref([]);
  
      const headers = ['S.no', 'Full Name', 'Gender', 'Address', 'Phone no.', 'DOB', 'Email', 'Department', 'Position', 'Actions'];
  
      const fetchEmployees = async () => {
        try {
          console.log('Fetching employees...');
          const response = await api.get('/employee');
          employees.value = response.data;
          console.log('Employees fetched:', employees.value);
        } catch (error) {
          console.error('Error fetching employees:', error.response?.data || error.message);
        }
      };
  
      const addEmployee = async () => {
        try {
          console.log('Adding employee:', newEmployee.value.name);
          const response = await api.post('/employee-store', {
            name: newEmployee.value.name,
            email: newEmployee.value.email,
            position: newEmployee.value.position,
          });
          if (response.data) {
            employees.value.push(response.data);
            newEmployee.value.name = '';
            newEmployee.value.email = '';
            newEmployee.value.position = '';
          } else {
            console.error('Error: No data returned from API');
          }
        } catch (error) {
          console.error('Error adding employee:', error.response?.data || error.message);
        }
      };
  
      const editEmployee = async (index) => {
        const id = employees.value[index].id;
        console.log('Edit employee:', id);
        // Implement edit functionality
      };
  
      const deleteEmployee = async (index) => {
        const id = employees.value[index].id;
        console.log('Deleting employee:', id);
        try {
          await api.delete(`/employee/${id}`);
          employees.value = employees.value.filter((employee) => employee.id !== id);
        } catch (error) {
          console.error('Error deleting employee:', error.response?.data || error.message);
        }
      };
  
      onMounted(fetchEmployees);
  
      const employeeRows = computed(() => {
        return employees.value.map((employee, index) => [
          index + 1,
          employee.user.name,
          employee.gender,
          employee.address,
          employee.phone,
          employee.dob,
          employee.user.email,
          employee.department,
          employee.position,
          null, // Placeholder for action buttons
        ]);
      });
  
      return {
        newEmployee,
        employees,
        headers,
        employeeRows,
        addEmployee,
        editEmployee,
        deleteEmployee,
      };
    },
  };
  </script>
  
  <style scoped>

  .table-top{
    display: flex;
    justify-content: space-between;
  }

  .list-employee {
    margin: 12px 16px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
  }
  
  .edit-btn,
  .delete-btn {
    margin-right: 10px;
    border-radius: .375rem;
    color: #ffffff;
    font-size: 14px;
    padding: 5px 10px;
  }
  
  .edit-btn {
    background-color: #2374E1;
  }
  
  .edit-btn:hover {
    background-color: #256fce;
  }
  
  .delete-btn {
    background-color: #da1010;
  }
  
  .delete-btn:hover {
    background-color: #c70d0d;
  }
  </style>
  