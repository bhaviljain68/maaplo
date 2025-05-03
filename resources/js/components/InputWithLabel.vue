<script setup>
import { defineProps, defineEmits } from 'vue'
const props = defineProps(['type', 'id', 'name', 'color', 'padding', 'margin', 'rounded', 'fullWidth', 'textSize', 'disabled', 'placeholder', 'modelValue', 'width', 'fonttype', 'label', 'radioValue'])
const emit = defineEmits(['update:modelValue'])

// Color classes
const colorClass = {
    primary: 'bg-primary border border-primary text-black focus:border-primary',
    gray: 'border text-gray-800 focus:border-gray-500',
    grayBorder: 'border border-gray-600 text-gray-800 focus:border-gray-500',
}[props.color] ?? 'bg-white border border-gray-300 text-black'

// Padding classes
const paddingClass = {
    sm: 'py-1 px-3',
    md: 'py-2 px-4',
    lg: 'py-3 px-6',
}[props.padding] ?? 'py-2 px-4'

// Rounded classes
const roundedClass = {
    none: '',
    sm: 'rounded-sm',
    md: 'rounded-md',
    lg: 'rounded-lg',
    full: 'rounded-full',
}[props.rounded] ?? 'rounded-md'

// Text size classes
const textSizeClass = {
    xs: 'text-xs',
    sm: 'text-sm',
    base: 'text-base',
    lg: 'text-lg',
    xl: 'text-xl',
}[props.textSize] ?? ''

// Margin class
const marginClass = {
    sm: 'mt-1',
    md: 'mt-2',
    lg: 'mt-4',
}[props.margin] ?? ''

const widthClass = {
    sm: 'w-4',
    md: 'w-20',
    lg: 'w-96',
    full: 'w-full',
}[props.width] ?? ''
</script>

<template>
    <div class="flex flex-col">
        <label v-if="label" :for="id" :class="[textSizeClass, fonttype]">
            {{ label }}
        </label>
        <input :type="type" :placeholder="placeholder" :value="radioValue" :id="id" :name="name"
            @input="$emit('update:modelValue', $event.target.value)"
            :disabled="disabled" :class="[
                'transition duration-200 focus:outline-none',
                colorClass,
                paddingClass,
                roundedClass,
                textSizeClass,
                marginClass,
                widthClass,
                fullWidth ? 'w-full' : '',
                disabled ? 'opacity-50 cursor-not-allowed' : ''
            ]" />
    </div>
</template>
