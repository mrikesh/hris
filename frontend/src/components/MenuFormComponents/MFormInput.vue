<template>
    <div class="input-wrapper">
      <input
        :type="inputType"
        :placeholder="placeHolder"
        :name="formName"
        v-model="computedValue" 
      />
    </div>
  </template>
  
  <script>
  export default {
    name: 'MFormInput',
    props: {
      inputType: {
        type: String,
        default: 'text'
      },
      placeHolder: {
        type: String,
        default: ''
      },
      formName: {
        type: String,
        default: ''
      },
      modelValue: { // v-model prop
        type: [String, Number],
        default: ''
      }
    },
    computed: {
      computedValue: {
        get() {
          return this.modelValue;
        },
        set(value) {
          this.$emit('update:modelValue', value); // Emit the value update event
        }
      }
    }
  }
  </script>
  
  <style scoped>
  .input-wrapper {
    margin: 4px 16px 8px 16px;
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
  </style>
  