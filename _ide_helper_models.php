<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $nama_dokter
 * @property string $spesialis
 * @property string $no_telp
 * @property string $alamat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dokter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dokter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dokter query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dokter whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dokter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dokter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dokter whereNamaDokter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dokter whereNoTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dokter whereSpesialis($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dokter whereUpdatedAt($value)
 */
	class Dokter extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nik
 * @property string $nama_pasien
 * @property string $tgl_lahir
 * @property string $no_telp
 * @property string $alamat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereNamaPasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereNoTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereUpdatedAt($value)
 */
	class Pasien extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $pasien_id
 * @property int $dokter_id
 * @property string $tgl_periksa
 * @property string $keluhan
 * @property string $diagnosa
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Dokter $dokter
 * @property-read \App\Models\Pasien $pasien
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekamMedis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekamMedis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekamMedis query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekamMedis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekamMedis whereDiagnosa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekamMedis whereDokterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekamMedis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekamMedis whereKeluhan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekamMedis wherePasienId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekamMedis whereTglPeriksa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekamMedis whereUpdatedAt($value)
 */
	class RekamMedis extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

