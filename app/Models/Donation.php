<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_id',
        'donor_name',
        'donor_email',
        'donor_phone',
        'amount',
        'type',
        'payment_method',
        'payment_gateway',
        'transaction_id',
        'status',
        'notes',
        'anonymous',
        'receipt_path',
        'paid_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'anonymous' => 'boolean',
        'paid_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeByGateway($query, $gateway)
    {
        return $query->where('payment_gateway', $gateway);
    }

    public function generateReceiptNumber(): string
    {
        return 'DON-' . date('Y') . '-' . str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }

    public function getFormattedAmount(): string
    {
        return number_format($this->amount, 2) . ' ج.م';
    }

    public function getStatusColor(): string
    {
        return match($this->status) {
            'completed' => 'green',
            'pending' => 'yellow',
            'failed' => 'red',
            'refunded' => 'gray',
            default => 'gray'
        };
    }

    public function getStatusText(): string
    {
        return match($this->status) {
            'completed' => 'مكتمل',
            'pending' => 'قيد الانتظار',
            'failed' => 'فشل',
            'refunded' => 'مسترد',
            default => 'غير معروف'
        };
    }

    public function getPaymentMethodText(): string
    {
        return match($this->payment_method) {
            'credit_card' => 'بطاقة ائتمان',
            'mobile_wallet' => 'محفظة محمول',
            'bank_transfer' => 'تحويل بنكي',
            'fawry' => 'فوري',
            'paymob' => 'بايموب',
            'stripe' => 'سترايب',
            'paypal' => 'باي بال',
            default => 'غير معروف'
        };
    }
}
