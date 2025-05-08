<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \Illuminate\Support\Facades\Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'customer_id' => ['required', 'exists:customers,id'],
            // 'order_number' => ['required', 'string', 'unique:orders,order_number'],
            'total_amount' => ['required', 'numeric', 'min:0'],
            'advance_paid' => ['required', 'numeric', 'min:0', 'lte:total_amount'],
            'delivery_date' => ['required', 'date', 'after_or_equal:today'],
            'close_date' => ['nullable', 'date', 'after_or_equal:delivery_date'],
            'notes' => ['nullable', 'array'],

            //- This Rules Is Defined For Order Items
            'order_items' => ['required', 'array'],
            'order_items.*.order_id' => ['required', 'string'],
            'order_items.*.item_template_id' => ['required', 'numeric'],
            'order_items.*.name' => ['required', 'string', 'max:256'],
            'order_items.*.measurements' => ['required', 'array'],
            'order_items.*.design_details' => ['required', 'array'],
            'order_items.*.colors' => ['required', 'string', 'max:256'],
            'order_items.*.notes' => ['required', 'array'],
            'order_items.*.trial_dates.*' => ['required', 'date', 'after_or_equal:today', 'before_or_equal:delivery_date'],
            'order_items.*.price' => ['required', 'numeric', 'min:0'],
            'order_items.*.work_type' => ['required', 'string', 'in:New from Material,Only Stitching,Only Altering'],
            'order_items.*.material_code' => ['nullable', 'string', 'max:256'],
            'order_items.*.material' => ['nullable', 'string', 'max:256'],
            'order_items.*.refrence_dress' => ['required', 'string', 'in:yes,no'],
            'order_items.*.material_cost' => ['nullable', 'numeric', 'min:0'],
            'order_items.*.stiching_cost' => ['nullable', 'numeric', 'min:0'],
            'order_items.*.item_cost' => ['required', 'numeric', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'User is required.',
            'user_id.exists' => 'User does not exist.',

            'customer_id.required' => 'Please select a customer.',
            'customer_id.exists' => 'The selected customer does not exist.',

            // 'order_number.required' => 'Order number is required.',
            // 'order_number.unique' => 'Order number must be unique.',

            'total_amount.required' => 'Total amount is required.',
            'total_amount.numeric' => 'Total amount must be a valid number.',
            'total_amount.min' => 'Total amount must be at least 0.',

            'advance_paid.required' => 'Advance paid is required.',
            'advance_paid.numeric' => 'Advance paid must be a number.',
            'advance_paid.min' => 'Advance paid must be at least 0.',
            'advance_paid.lte' => 'Advance paid cannot be more than the total amount.',

            'delivery_date.required' => 'Delivery date is required.',
            'delivery_date.date' => 'Delivery date must be a valid date.',
            'delivery_date.after_or_equal' => 'Delivery date cannot be in the past.',

            'close_date.date' => 'Close date must be a valid date.',
            'close_date.after_or_equal' => 'Close date cannot be earlier than the delivery date.',

            'notes.array' => 'Notes must be a valid array.',

            //-- This Validation Messages Is Defined For Order Items

            'order_items.required' => 'At least one order item is required.',
            'order_items.*.order_id.required' => 'Order ID is required for each item.',
            'order_items.*.item_template_id.required' => 'Template ID is required.',
            'order_items.*.item_template_id.numeric' => 'Template ID must be a number.',
            'order_items.*.name.required' => 'Item name is required.',
            'order_items.*.name.max' => 'Item name cannot exceed 256 characters.',
            'order_items.*.measurements.required' => 'Measurements are required.',
            'order_items.*.design_details.required' => 'Design details are required.',
            'order_items.*.colors.required' => 'Color information is required.',
            'order_items.*.colors.max' => 'Color must not exceed 256 characters.',
            'order_items.*.notes.required' => 'Notes are required.',
            'order_items.*.trial_dates.*.required' => 'Trial date is required.',
            'order_items.*.trial_dates.*.date' => 'Trial date must be a valid date.',
            'order_items.*.trial_dates.*.after_or_equal' => 'Trial date cannot be in the past.',
            'order_items.*.trial_dates.*.before_or_equal' => 'Trial date must be before or equal to delivery date.',
            'order_items.*.price.required' => 'Price is required.',
            'order_items.*.price.numeric' => 'Price must be a number.',
            'order_items.*.price.min' => 'Price must be at least 0.',
            'order_items.*.work_type.required' => 'Work type is required.',
            'order_items.*.work_type.in' => 'Work type must be one of: New from Material, Only Stitching, Only Altering.',
            'order_items.*.material_code.string' => 'Material code must be text.',
            'order_items.*.material_code.max' => 'Material code may not be greater than 256 characters.',
            'order_items.*.material.string' => 'Material must be text.',
            'order_items.*.material.max' => 'Material may not be greater than 256 characters.',
            'order_items.*.refrence_dress.required' => 'Reference dress is required.',
            'order_items.*.refrence_dress.in' => 'Reference dress must be either "yes" or "no".',
            'order_items.*.material_cost.numeric' => 'Material cost must be a number.',
            'order_items.*.material_cost.min' => 'Material cost must be at least 0.',
            'order_items.*.stiching_cost.numeric' => 'Stitching cost must be a number.',
            'order_items.*.stiching_cost.min' => 'Stitching cost must be at least 0.',
            'order_items.*.item_cost.required' => 'Item cost is required.',
            'order_items.*.item_cost.numeric' => 'Item cost must be a number.',
            'order_items.*.item_cost.min' => 'Item cost must be at least 0.',

        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            foreach ($this->order_items as $index => $item) {
                $workType = $item['work_type'] ?? null;

                if ($workType === 'New from Material') {
                    if (empty($item['material']) || empty($item['material_code'])) {
                        $validator->errors()->add("order_items.$index.material", "Material is required for 'New from Material'.");
                        $validator->errors()->add("order_items.$index.material_code", "Material code is required for 'New from Material'.");
                    }

                    if (empty($item['material_cost'])) {
                        $validator->errors()->add("order_items.$index.material_cost", "Material cost is required for 'New from Material'.");
                    }
                }

                if (in_array($workType, ['New from Material', 'Only Stitching']) && empty($item['stiching_cost'])) {
                    $validator->errors()->add("order_items.$index.stiching_cost", "Stitching cost is required for '$workType'.");
                }
            }
        });
    }
}
