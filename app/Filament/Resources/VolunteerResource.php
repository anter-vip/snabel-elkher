<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VolunteerResource\Pages;
use App\Models\Volunteer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VolunteerResource extends Resource
{
    protected static ?string $model = Volunteer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'إدارة المتطوعين';

    protected static ?string $label = 'متطوع';
    protected static ?string $pluralLabel = 'المتطوعين';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('المعلومات الشخصية')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->label('الاسم الأول')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('last_name')
                            ->label('الاسم الأخير')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('البريد الإلكتروني')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->label('رقم الهاتف')
                            ->tel()
                            ->required()
                            ->maxLength(20),
                        Forms\Components\DatePicker::make('birth_date')
                            ->label('تاريخ الميلاد')
                            ->required(),
                        Forms\Components\Select::make('gender')
                            ->label('الجنس')
                            ->options([
                                'male' => 'ذكر',
                                'female' => 'أنثى',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('nationality')
                            ->label('الجنسية')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('address')
                            ->label('العنوان')
                            ->rows(3),
                        Forms\Components\TextInput::make('occupation')
                            ->label('المهنة')
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('المعلومات المهنية')
                    ->schema([
                        Forms\Components\Textarea::make('skills')
                            ->label('المهارات')
                            ->rows(3)
                            ->helperText('اذكر المهارات التي تمتلكها'),
                        Forms\Components\Textarea::make('experience')
                            ->label('الخبرات')
                            ->rows(3)
                            ->helperText('اذكر خبراتك السابقة في العمل التطوعي'),
                        Forms\Components\Select::make('availability')
                            ->label('مدة التطوع')
                            ->options([
                                'full_time' => 'دوام كامل',
                                'part_time' => 'دوام جزئي',
                                'weekends' => 'عطلة نهاية الأسبوع',
                                'flexible' => 'مرن',
                            ])
                            ->required(),
                        Forms\Components\Textarea::make('motivation')
                            ->label('الدافع للتطوع')
                            ->rows(4)
                            ->required()
                            ->helperText('لماذا ترغب في التطوع معنا؟'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('إدارة الطلب')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('الحالة')
                            ->options([
                                'pending' => 'قيد المراجعة',
                                'approved' => 'موافق عليه',
                                'rejected' => 'مرفوض',
                                'active' => 'نشط',
                            ])
                            ->required()
                            ->default('pending'),
                        Forms\Components\DateTimePicker::make('approved_at')
                            ->label('تاريخ الموافقة')
                            ->displayFormat('d/m/Y h:i A')
                            ->nullable(),
                        Forms\Components\Textarea::make('admin_notes')
                            ->label('ملاحظات الإدارة')
                            ->rows(3)
                            ->helperText('ملاحظات داخلية للمديرين'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label('الاسم الكامل')
                    ->getStateUsing(fn (Volunteer $record): string => $record->first_name . ' ' . $record->last_name)
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('رقم الهاتف')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('occupation')
                    ->label('المهنة')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\SelectColumn::make('gender')
                    ->label('الجنس')
                    ->options([
                        'male' => 'ذكر',
                        'female' => 'أنثى',
                    ]),
                Tables\Columns\SelectColumn::make('availability')
                    ->label('مدة التطوع')
                    ->options([
                        'full_time' => 'دوام كامل',
                        'part_time' => 'دوام جزئي',
                        'weekends' => 'عطلة نهاية الأسبوع',
                        'flexible' => 'مرن',
                    ]),
                Tables\Columns\SelectColumn::make('status')
                    ->label('الحالة')
                    ->options([
                        'pending' => 'قيد المراجعة',
                        'approved' => 'موافق عليه',
                        'rejected' => 'مرفوض',
                        'active' => 'نشط',
                    ])
                    ->colors([
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        'active' => 'primary',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ التقديم')
                    ->dateTime('d/m/Y h:i A')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'pending' => 'قيد المراجعة',
                        'approved' => 'موافق عليه',
                        'rejected' => 'مرفوض',
                        'active' => 'نشط',
                    ]),
                Tables\Filters\SelectFilter::make('gender')
                    ->label('الجنس')
                    ->options([
                        'male' => 'ذكر',
                        'female' => 'أنثى',
                    ]),
                Tables\Filters\SelectFilter::make('availability')
                    ->label('مدة التطوع')
                    ->options([
                        'full_time' => 'دوام كامل',
                        'part_time' => 'دوام جزئي',
                        'weekends' => 'عطلة نهاية الأسبوع',
                        'flexible' => 'مرن',
                    ]),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('من تاريخ'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('إلى تاريخ'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('approve')
                    ->label('موافقة')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (Volunteer $record) {
                        $record->update([
                            'status' => 'approved',
                            'approved_at' => now(),
                        ]);
                    })
                    ->visible(fn (Volunteer $record): bool => $record->status === 'pending'),
                Tables\Actions\Action::make('reject')
                    ->label('رفض')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (Volunteer $record) {
                        $record->update(['status' => 'rejected']);
                    })
                    ->visible(fn (Volunteer $record): bool => $record->status === 'pending'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('approve')
                        ->label('موافقة جماعية')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(function (\Illuminate\Support\Collection $records) {
                            $records->each(function (Volunteer $record) {
                                if ($record->status === 'pending') {
                                    $record->update([
                                        'status' => 'approved',
                                        'approved_at' => now(),
                                    ]);
                                }
                            });
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVolunteers::route('/'),
            'create' => Pages\CreateVolunteer::route('/create'),
            'view' => Pages\ViewVolunteer::route('/{record}'),
            'edit' => Pages\EditVolunteer::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
}
