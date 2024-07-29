<template>
<div>
    <div class="btn-wrapper">
        <button class="btn-container" @click="openModal" @mouseover="showTooltip" @mouseleave="hideTooltip">
            <i class="material-icons">add</i>
        </button>
        <div v-if="isTooltipVisible" class="tooltip">Add</div>
    </div>

    <!-- Modal Overlay -->
    <div v-if="isModalVisible" class="modal-overlay" @click="closeModal">
        <!-- Modal Content -->
        <div class="modal-content" @click.stop>
            <h2>Record Attendance</h2>

            <form @submit.prevent="submitForm">
                <fieldset>
                    <legend>Attendance Information</legend>
                    <label for="employeeId">Employee ID:</label>
                    <input type="text" id="employeeId" v-model="formData.employeeId" required />

                    <label for="employeeName">Employee Name:</label>
                    <input type="text" id="employeeName" v-model="formData.employeeName" required />

                    <label for="date">Date:</label>
                    <input type="date" id="date" v-model="formData.date" required />

                    <label for="checkin">Check-in Time:</label>
                    <input type="time" id="checkin" v-model="formData.checkin" required />

                    <label for="checkout">Check-out Time:</label>
                    <input type="time" id="checkout" v-model="formData.checkout" required />
                </fieldset>

                <!-- Buttons -->
                <div class="button-group">
                    <button type="submit" class="submit-btn">Submit</button>
                    <button type="button" class="cancel-btn" @click="closeModal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>

  
<script>
export default {
    name: "AddAttendanceBtn",
    data() {
        return {
            isTooltipVisible: false,
            isModalVisible: false,
            formData: {
                employeeId: '',
                employeeName: '',
                date: '',
                checkin: '',
                checkout: ''
            }
        };
    },
    methods: {
        showTooltip() {
            this.isTooltipVisible = true;
        },
        hideTooltip() {
            this.isTooltipVisible = false;
        },
        openModal() {
            this.isModalVisible = true;
        },
        closeModal() {
            this.isModalVisible = false;
        },
        submitForm() {
            // Handle form submission
            console.log('Form submitted with:', this.formData);
            this.closeModal(); // Hide the modal after submission
        }
    }
};
</script>

  
<style scoped>
.btn-wrapper {
    position: relative;
    display: inline-block;
}

.btn-container {
    margin: 0 0 0 8px;
    width: 42px;
    height: 42px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    border: none;
    background-color: #2374e1;
    color: #ffffff;
    font-size: 24px;
    cursor: pointer;
}

.btn-container:hover {
    background-color: #3d84e3;
}

.tooltip {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    margin-top: 8px;
    padding: 4px 8px;
    background-color: #757575;
    color: #ffffff;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
    opacity: 0;
    animation: fadeIn 0.3s forwards;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.modal-content {
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 400px;
    max-width: 90%;
}

.modal-content h2 {
    margin-top: 0;
    font-size: 24px;
    color: #333;
}

fieldset {
    border: none;
    margin-bottom: 16px;
    padding: 0;
}

legend {
    font-weight: 500;
    margin: 12px 0;
    font-size: 18px;
    color: #555;
}

label {
    display: block;
    margin: 8px 0 4px;
    font-size: 14px;
    color: #333;
}

input[type="text"],
input[type="date"],
input[type="time"] {
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-size: 14px;
    color: #333;
    box-sizing: border-box;
}

.button-group {
    margin-top: 16px;
}

button {
    margin-top: 8px;
    padding: 10px 15px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    font-size: 14px;
    color: #fff;
}

.submit-btn {
    background-color: #2374e1;
    margin-right: 10px;
}

.submit-btn:hover {
    background-color: #256fce;
}

.cancel-btn {
    background-color: #ccc;
}

.cancel-btn:hover {
    background-color: #999;
}
</style>
